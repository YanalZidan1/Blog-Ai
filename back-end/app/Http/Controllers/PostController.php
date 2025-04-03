<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // index
    public function index(){
        $posts = Post::where('user_id', Auth::id())->latest()->paginate(8);
        return view('posts.index', compact('posts'));
    }

    // store
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'En_title' => 'required|min:3|string',
            'Ar_title' => 'required|min:3|string',
            'En_content' => 'required|string|max:1000000000000',
            'Ar_content' => 'required|string|max:1000000000000',
            'post_cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'card_cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Ensure the post cover directory exists
        if (!Storage::disk('public')->exists('post_covers')) {
            Storage::disk('public')->makeDirectory('post_covers');
        }

        // Ensure the card cover directory exists
        if (!Storage::disk('public')->exists('card_covers')) {
            Storage::disk('public')->makeDirectory('card_covers');
        }

        // Store the post cover image if present
        if ($request->hasFile('post_cover')) {
            $postCoverPath = $request->file('post_cover')->store('post_covers', 'public');
            $validatedData['post_cover'] = $postCoverPath;
        }

        // Store the card cover image if present
        if ($request->hasFile('card_cover')) {
            $cardCoverPath = $request->file('card_cover')->store('card_covers', 'public');
            $validatedData['card_cover'] = $cardCoverPath;
        }

        // Create a new post with the validated data
        Post::create([
            'user_id' => Auth::id(),  // Assign the logged-in user's ID
            'En_title' => $validatedData['En_title'],
            'Ar_title' => $validatedData['Ar_title'],
            'En_content' => $validatedData['En_content'],
            'Ar_content' => $validatedData['Ar_content'],
            'post_cover' => $validatedData['post_cover'] ?? null,
            'card_cover' => $validatedData['card_cover'] ?? null,
        ]);

        // Redirect to the posts page with a success message
        return redirect()->route('posts')->with('success', 'Post created successfully!');
    }

    // show
    public function show($id){
        $post = Post::find($id);
        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }
        return response()->json([
            'message' => 'Post retrieved successfully',
            'post' => $post,
        ], 200);
    }

    // update
    public function update(Request $request, Post $post)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'En_title' => 'required|min:3|string',
            'Ar_title' => 'required|min:3|string',
            'En_content' => 'required|string|max:1000000000000',
            'Ar_content' => 'required|string|max:1000000000000',
            'post_cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'card_cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // update the post cover image if present
        if ($request->hasFile('post_cover')) {
            // Delete the old post cover image if it exists
            if ($post->post_cover) {
                Storage::disk('public')->delete($post->post_cover);
            }
            // Store the new post cover image
            $validatedData['post_cover'] = $request->file('post_cover')->store('post_covers', 'public');
        }

        // update the card cover image if present
        if ($request->hasFile('card_cover')) {
            // Delete the old card cover image if it exists
            if ($post->card_cover) {
                Storage::disk('public')->delete($post->card_cover);
            }
            // Store the new card cover image
            $validatedData['card_cover'] = $request->file('card_cover')->store('card_covers', 'public');
        }


        // Update the post with the validated data
        $post->update($validatedData);

        // Redirect to the posts page with a success message
        return back()->with('success', 'Post updated successfully');
    }

    // destroy
    public function destroy(Post $post)
    {
        // Delete the post cover image if it exists
        if ($post->post_cover) {
            Storage::disk('public')->delete($post->post_cover);
        }
        // Delete the card cover image if it exists
        if ($post->card_cover) {
            Storage::disk('public')->delete($post->card_cover);
        }
        // Delete the post
        $post->delete();

        // Redirect to the posts page with a success message
        return back()->with('success', 'Post deleted successfully');
    }


    // get all posts
    public function getAllPosts()
    {
        $posts = Post::all();
        return response()->json([
            'message' => 'Posts retrieved successfully',
            'posts' => $posts
        ], 200);
    }
}

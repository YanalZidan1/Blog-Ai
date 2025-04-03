import React, { useEffect } from "react";
import AOS from "aos";
import "aos/dist/aos.css"; // Import AOS styles

function Footer() {
  useEffect(() => {
    // Initialize AOS
    AOS.init({
      duration: 1000, // Duration of the animation
      once: true, // Animation happens only once
    });
  }, []);

  return (
    <footer
      className="footer container-fluid p-0"
      style={{ backgroundColor: "rgb(2, 38, 63)" }}
    >
      <div className="container p-5">
        <div className="row">
          {/* First Section (Logo + Description + Social Media Links) */}
          <div
            className="col-md-5 d-flex flex-column gap-3"
            data-aos="fade-right" // AOS animation for this section
          >
            <div
              className="footer-logo"
              style={{
                width: "100px",
                height: "100px",
                overflow: "hidden",
                display: "flex",
              }}
            >
              <img
                src="https://placehold.co/400x400"
                alt="Footer Logo"
                style={{ width: "100%", height: "auto" }}
              />
            </div>

            <p className="text-white" data-aos="fade-up" data-aos-delay="300">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Suscipit
              nesciunt, quasi error praesentium nostrum quis repellat aspernatur
              vero architecto, inventore minima temporibus tempore cumque in
              eveniet aliquam necessitatibus pariatur eaque.
            </p>

            {/* Social Media Links */}
            <div
              className="footer-social-links d-flex gap-3"
              data-aos="fade-left" // AOS animation for social media links
            >
              {[
                { icon: "facebook", label: "Facebook" },
                { icon: "instagram", label: "Instagram" },
                { icon: "twitter", label: "Twitter" },
                { icon: "linkedin", label: "LinkedIn" },
                { icon: "youtube", label: "YouTube" },
              ].map((social, index) => (
                <a
                  key={index}
                  href="#"
                  className="fs-5 text-white"
                  aria-label={social.label}
                  style={{ transition: "color 0.3s" }}
                  onMouseEnter={(e) => (e.target.style.color = "#ff6347")}
                  onMouseLeave={(e) => (e.target.style.color = "white")}
                >
                  <i className={`fa-brands fa-${social.icon}`}></i>
                </a>
              ))}
            </div>
          </div>

          {/* Second Section (Quick Links and Categories) */}
          <div
            className="col-md-7 d-flex justify-content-between"
            data-aos="fade-up" // AOS animation for this section
          >
            {[
              { title: "Quick Links", links: ["Home", "Categories", "About", "Contact"] },
              { title: "Categories", links: ["Category 1", "Category 2", "Category 3", "Category 4"] },
              { title: "More Links", links: ["Privacy Policy", "Terms of Service", "Support", "FAQ"] },
            ].map((section, index) => (
              <div key={index} className="col-md-3">
                <h5 className="text-white title">{section.title}</h5>
                <ul className="list-unstyled d-flex flex-column gap-3 mt-4">
                  {section.links.map((link, i) => (
                    <li key={i} className="list-footer">
                      <a
                        href="#"
                        className="text-white"
                        style={{
                          textDecoration: "none",
                          transition: "color 0.3s",
                        }}
                        onMouseEnter={(e) => (e.target.style.color = "#ff6347")}
                        onMouseLeave={(e) => (e.target.style.color = "white")}
                      >
                        {link}
                      </a>
                    </li>
                  ))}
                </ul>
              </div>
            ))}
          </div>
        </div>
      </div>

      <hr className="text-white mx-4" />

      <div className="footer-bottom text-center py-3" data-aos="fade-up">
        <p className="text-white">
          Copyright &copy; {new Date().getFullYear()} All rights reserved |
          Made with ❤️ by <span className="text-danger">YanalZidan</span>
        </p>
      </div>
    </footer>
  );
}

export default Footer;

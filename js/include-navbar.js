// Dynamically load navbar.html into the #navbar-placeholder div
window.addEventListener('DOMContentLoaded', function() {
  const placeholder = document.getElementById('navbar-placeholder');
  if (placeholder) {
    fetch('navbar.html')
      .then(response => {
        if (!response.ok) throw new Error('Network response was not ok');
        return response.text();
      })
      .then(html => {
        placeholder.innerHTML = html;
        // Attach hamburger event after navbar is loaded
        var btn = document.getElementById('hamburger-btn');
        var links = document.getElementById('navbar-links');
        if(btn && links) {
          btn.onclick = function () {
            links.classList.toggle('show');
          };
        }
      })
      .catch(error => {
        placeholder.innerHTML = '<div style="color:red; text-align:center;">Navbar लोड नहीं हो सका</div>';
      });
  }
}); 
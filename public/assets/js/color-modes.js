document.addEventListener('DOMContentLoaded', function () {
  const themeToggle = document.getElementById('bd-theme');
  const themeOptions = document.querySelectorAll('[data-bs-theme-value]');

  // Function to change theme
  function setTheme(theme) {
      document.documentElement.setAttribute('data-bs-theme', theme);
      localStorage.setItem('theme', theme);
  }

  // Load saved theme from local storage
  const savedTheme = localStorage.getItem('theme') || 'auto';
  setTheme(savedTheme);

  // Handle theme changes
  themeOptions.forEach(option => {
      option.addEventListener('click', function () {
          const theme = this.getAttribute('data-bs-theme-value');
          setTheme(theme);
      });
  });
});

document.addEventListener('DOMContentLoaded', function () {
  const themeToggleBtn = document.getElementById('theme-toggle-btn');
  const themeIcon = document.getElementById('theme-icon');
  const themeOptions = document.querySelectorAll('[data-bs-theme-value]');

  // Function to change theme and update icon
  function setTheme(theme) {
    if (theme === 'auto') {
      theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    }
    document.documentElement.setAttribute('data-bs-theme', theme);
    localStorage.setItem('theme', theme);
    
    if (theme === 'light') {
      themeIcon.classList.remove('bi-sun');
      themeIcon.classList.add('bi-moon');
    } else {
      themeIcon.classList.remove('bi-moon');
      themeIcon.classList.add('bi-sun');
    }
  }

  // Load saved theme from local storage or set default to 'auto'
  const savedTheme = localStorage.getItem('theme') || 'auto';
  setTheme(savedTheme);

  // Toggle between light and dark themes on button click
  themeToggleBtn.addEventListener('click', function () {
    const currentTheme = document.documentElement.getAttribute('data-bs-theme');
    const newTheme = currentTheme === 'light' ? 'dark' : 'light';
    setTheme(newTheme);
  });

  // Handle theme changes from dropdown menu
  themeOptions.forEach(option => {
    option.addEventListener('click', function () {
      const theme = this.getAttribute('data-bs-theme-value');
      setTheme(theme);
    });
  });
});

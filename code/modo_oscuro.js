document.addEventListener('DOMContentLoaded', function () {
    const darkModeToggle = document.getElementById('darkModeToggle');
    const body = document.body;

   
    const isDarkMode = localStorage.getItem('darkMode') === 'true';


    if (isDarkMode) {
        body.classList.add('dark-mode');
    }

    darkModeToggle.addEventListener('click', function () {
      
        body.classList.toggle('dark-mode');

        localStorage.setItem('darkMode', body.classList.contains('dark-mode'));
    });
});

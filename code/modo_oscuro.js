const darkModeToggle = document.getElementById('darkModeToggle');
const body = document.body;

if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
    body.classList.add('dark-mode');
}

darkModeToggle.addEventListener('click', () => {
    body.classList.toggle('dark-mode');
});

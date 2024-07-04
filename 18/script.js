const button1 = document.getElementById('button1');
const button2 = document.getElementById('button2');
const button3 = document.getElementById('button3');
const counterValue = document.getElementById('counter-value');
const background = document.getElementById('background');

let count = 0;

button1.addEventListener('click', () => {
  window.open('https://www.example.com', '_blank');
});

button2.addEventListener('click', () => {
  count++;
  counterValue.textContent = count;
});

button3.addEventListener('click', () => {
  const colors = ['#008B8B', '#FF0000', '#00FF00'];
  const randomIndex = Math.floor(Math.random() * colors.length);
  background.style.backgroundColor = colors[randomIndex];
});

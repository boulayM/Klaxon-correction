const trajetsButton = document.getElementById('trajetsButton');
const agencesButton = document.getElementById('agencesButton');
const usersButton = document.getElementById('usersButton');
const users = document.getElementById('users');
const agences = document.getElementById('agences');
const trajets = document.getElementById('trajets');

trajetsButton.addEventListener('click', () => {
  if (agences.style.display === 'block') {
        agences.style.display = 'none';}
  if (users.style.display === 'block') {
        users.style.display = 'none';}
  if (trajets.style.display === 'block') {
        trajets.style.display = 'none';} else {
        trajets.style.display = 'block'
      
}});

agencesButton.addEventListener('click', () => {
  if (trajets.style.display === 'block') {
        trajets.style.display = 'none';
      }
  if (users.style.display === 'block') {
        users.style.display = 'none';
      }
  if (agences.style.display === 'block') {
        agences.style.display = 'none';
      } else {
        agences.style.display = 'block';
      }
});

usersButton.addEventListener('click', () => {
  if (agences.style.display === 'block') {
        agences.style.display = 'none';
      }
  if (trajets.style.display === 'block') {
        trajets.style.display = 'none';
      }
  if (users.style.display === 'block') {
        users.style.display = 'none';
      } else {
        users.style.display = 'block';
      }
});
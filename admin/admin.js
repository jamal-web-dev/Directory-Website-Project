const sidebar = document.querySelector('.admin-sidebar');
const toggle = document.querySelector('.sidebar-toggle');
const closeButton = document.querySelector('.sidebar-close');
const overlay = document.querySelector('.sidebar-overlay');

function setSidebar(open) {
  sidebar?.classList.toggle('is-open', open);
  overlay?.classList.toggle('is-visible', open);
  document.body.classList.toggle('sidebar-open', open);
  toggle?.setAttribute('aria-expanded', String(open));
}

toggle?.addEventListener('click', () => setSidebar(!sidebar.classList.contains('is-open')));
closeButton?.addEventListener('click', () => setSidebar(false));
overlay?.addEventListener('click', () => setSidebar(false));
document.addEventListener('keydown', (event) => { if (event.key === 'Escape') setSidebar(false); });

const dialog = document.querySelector('.status-dialog');
const statusSelect = document.querySelector('#listing-status');
const listingName = document.querySelector('.listing-name');
let selectedRow;

document.querySelectorAll('.edit-button').forEach((button) => {
  button.addEventListener('click', () => {
    selectedRow = button.closest('tr');
    listingName.textContent = button.dataset.name;
    statusSelect.value = button.dataset.status;
    dialog.showModal();
  });
});

document.querySelector('.save-status')?.addEventListener('click', () => {
  if (!selectedRow) return;
  const isActive = statusSelect.value === 'active';
  const badge = selectedRow.querySelector('.status');
  badge.textContent = isActive ? 'Active' : 'Pending';
  badge.className = `status ${isActive ? 'active-status' : 'pending-status'}`;
  selectedRow.querySelector('.edit-button').dataset.status = statusSelect.value;
  document.querySelector('.toast').textContent = 'Listing status updated for this session.';
  document.querySelector('.toast').classList.add('show');
  setTimeout(() => document.querySelector('.toast').classList.remove('show'), 3000);
});

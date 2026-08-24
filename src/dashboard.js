const sidebar = document.querySelector("#dashboard-sidebar");
const sidebarToggle = document.querySelector(".sidebar-toggle");
const sidebarClose = document.querySelector(".sidebar-close");
const sidebarOverlay = document.querySelector(".sidebar-overlay");
const mobileSidebarQuery = window.matchMedia("(width <= 900px)");

if (sidebar && sidebarToggle && sidebarClose && sidebarOverlay) {
  const setSidebarState = (isOpen) => {
    const isMobile = mobileSidebarQuery.matches;
    sidebar.classList.toggle("is-open", isOpen);
    sidebarOverlay.classList.toggle("is-visible", isOpen);
    document.body.classList.toggle("sidebar-open", isMobile && isOpen);
    sidebarToggle.setAttribute("aria-expanded", String(isOpen));
    sidebar.setAttribute("aria-hidden", String(isMobile && !isOpen));
  };

  const closeSidebar = () => setSidebarState(false);

  sidebarToggle.addEventListener("click", () => {
    setSidebarState(!sidebar.classList.contains("is-open"));
  });
  sidebarClose.addEventListener("click", closeSidebar);
  sidebarOverlay.addEventListener("click", closeSidebar);
  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape") closeSidebar();
  });
  mobileSidebarQuery.addEventListener("change", closeSidebar);
  closeSidebar();
}

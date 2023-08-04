// JavaScript.js

// Attendre que le DOM soit chargé
document.addEventListener("DOMContentLoaded", function () {
    // Récupérer les éléments du menu et les filtres
    const menuItems = document.querySelectorAll(".menu-item");
    const filters = document.querySelectorAll("#menu-flters li");
  
    // Ajouter un gestionnaire d'événement pour chaque filtre
    filters.forEach((filter) => {
      filter.addEventListener("click", function () {
        const selectedFilter = filter.getAttribute("data-filter");
  
        // Masquer tous les éléments du menu
        menuItems.forEach((item) => {
          item.style.display = "none";
        });
  
        // Afficher les éléments du menu qui correspondent au filtre sélectionné
        if (selectedFilter === "*") {
          menuItems.forEach((item) => {
            item.style.display = "block";
          });
        } else {
          const filteredItems = document.querySelectorAll(selectedFilter);
          filteredItems.forEach((item) => {
            item.style.display = "block";
          });
        }
  
        // Ajouter/Supprimer la classe "filter-active" pour mettre en évidence le filtre sélectionné
        filters.forEach((f) => {
          f.classList.remove("filter-active");
        });
        filter.classList.add("filter-active");
      });
    });
  });

  

  

  

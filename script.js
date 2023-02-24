const cards = document.querySelectorAll(".card");

cards.forEach((e) => {
   e.addEventListener("click", () => {
      e.classList.toggle(".flip");
   })
})
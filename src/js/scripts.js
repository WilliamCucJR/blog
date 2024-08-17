document.addEventListener("DOMContentLoaded", () => {
  fetch("/api/get_posts.php")
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.json();
    })
    .then((posts) => {
      const postsContainer = document.getElementById("posts-container");
      posts.forEach((post) => {
        const postElement = document.createElement("div");
        postElement.classList.add("post");

        postElement.innerHTML = `
                    <h2>${post.titulo}</h2>
                    <p>${post.contenido.substring(0, 150)}...</p>
                    <img src="${post.img_url}" alt="${post.titulo}">
                `;

        postsContainer.appendChild(postElement);
      });
    })
    .catch((error) => {
      console.error("Error fetching posts:", error);
    });
});

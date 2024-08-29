document.addEventListener("DOMContentLoaded", () => {
  fetch("/api/get_posts.php")
    .then((response) => {
      if (!response.ok) {
        throw new Error("Error en la respuesta del servidor");
      }
      return response.json();
    })
    .then((posts) => {
      console.log(posts);
      
      const postsContainer = document.getElementById("posts-container");
      posts.forEach((post) => {
        const postElement = document.createElement("div");
        postElement.classList.add("post");

        postElement.innerHTML = `
                    <div class="container card-post">
                      <div class="row">
                        <div class="col-lg-2 img-row">
                          <img src="${post.img_url}" alt="${post.titulo}" class="post-img">
                        </div>
                        <div class="col-lg-10 content-row">
                          <h2>${post.titulo}</h2>
                          <small>By ${post.nombre} on ${post.creado_en}</small>
                          <br>
                          <br>
                          <p>${post.contenido.substring(0, 500)}...</p>
                        </div>
                      </div>
                    </div>
                                `;

        postsContainer.appendChild(postElement);
      });
    })
    .catch((error) => {
      console.error("Error:", error);
    });
});

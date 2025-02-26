// me gusta
document.addEventListener("DOMContentLoaded", async function () {
    const buttons = document.querySelectorAll(".meGusta");

    try {
        const response = await fetch("/user-likes", {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
            },
        });

        const userLikes = await response.json();
        buttons.forEach(button => {
            const comentarioId = button.getAttribute("data-id");
            const tipo = button.getAttribute("data-tipo");
            const svg = button.querySelector("svg");
            
            const megustas = {comentario_id: parseInt(comentarioId), tipo: tipo}

           

            for(let i = 0; i < userLikes.length; i++){

                if (userLikes[i].comentario_id == megustas.comentario_id && userLikes[i].tipo == megustas.tipo) {  
                    svg.style.fill = "red"; // Si el comentario está en la lista de likes, lo marcamos
                }
                
            }
            
            

            
        });
    } catch (error) {
        console.error("Error al cargar los 'Me Gusta':", error);
    }

    buttons.forEach(button => {
        button.addEventListener("click", async function () {
            const comentarioId = this.getAttribute("data-id");
            const tipo = this.getAttribute("data-tipo");
            const likeCountElement = this.closest(".comment-react").querySelector(".like-count");
            const svg = this.querySelector("svg");

            try {
                const response = await fetch("/likerestaurante", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({ id: comentarioId, tipo: tipo }),
                });

                const result = await response.json();

                if (!result.success) {
                    throw new Error(result.message || "Error al procesar el 'Me Gusta'");
                }

                likeCountElement.innerText = result.likes;
                svg.style.fill = result.liked ? "red" : "none";

            } catch (error) {
                console.error("Error al procesar el 'Me Gusta':", error);
            }
        });
    });
});

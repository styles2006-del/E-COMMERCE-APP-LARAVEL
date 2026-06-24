class Cart {
    constructor(lines) {
        this.lines = [];
    }
    addArticle(idArticle) {
        const article = this.lines.find(elt => elt.id === idArticle)
        console.log(article)
        if (article) {
            article.quantity++;
        } else {
            this.lines.push({
                "id": idArticle,
                "quantity": 1
            })
        }

    }
    removeArticle(idArticle) {
        const article = this.lines.find(elt => elt.id === idArticle)
        if (article) {
            if (article.quantity == 1) {
                this.lines = this.lines.filter((line) => line.id !== idArticle)
            } else {
                article.quantity--;
            }
        }
    }
}
const cart = new Cart([])

const btns = document.querySelectorAll(".add-to-card");
for (const btn of btns) {
    btn.addEventListener('click', (e) => {
        cart.addArticle(e.target.id)
    });
}



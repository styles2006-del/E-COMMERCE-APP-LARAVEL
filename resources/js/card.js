class Cart {
    constructor() {
        this.lines = [];
        const savedPanier = localStorage.getItem("panier");
        if (savedPanier) {
            try {
                this.lines = JSON.parse(savedPanier);
            } catch (e) {
                this.lines = [];
            }
        }
        this.afficherPanier();
    }

    savePanier() {
        localStorage.setItem("panier", JSON.stringify(this.lines));
        this.afficherPanier();
    }

    addArticle(idArticle, label, price = 0, cover = '') {
        const article = this.lines.find(elt => String(elt.id) === String(idArticle));
        if (article) {
            article.quantity++;
            if (price && !article.price) article.price = Number(price);
            if (cover && !article.cover) article.cover = cover;
        } else {
            this.lines.push({
                id: idArticle,
                label: label,
                price: Number(price) || 0,
                cover: cover || '',
                quantity: 1
            });
        }
        this.savePanier();
        this.showToast(label);
    }

    removeArticle(idArticle) {
        const article = this.lines.find(elt => String(elt.id) === String(idArticle));
        if (article) {
            if (article.quantity <= 1) {
                this.lines = this.lines.filter(line => String(line.id) !== String(idArticle));
            } else {
                article.quantity--;
            }
        }
        this.savePanier();
    }

    deleteArticle(idArticle) {
        this.lines = this.lines.filter(line => String(line.id) !== String(idArticle));
        this.savePanier();
    }

    clearCart() {
        if (this.lines.length === 0) return;
        if (confirm("Voulez-vous vraiment vider votre panier ?")) {
            this.lines = [];
            this.savePanier();
        }
    }

    formatPrice(amount) {
        return new Intl.NumberFormat('fr-FR').format(amount) + ' FCFA';
    }

    afficherPanier() {
        const panier = document.getElementById("panier");
        const cartBadges = document.querySelectorAll(".cart-count-badge");
        const cartTotalDisplay = document.getElementById("cart-total-price");
        const cartSubtotalDisplay = document.getElementById("cart-subtotal-price");
        const checkoutBtn = document.getElementById("checkout-submit-btn");

        // Calculate Totals
        let totalItems = 0;
        let totalPrice = 0;

        for (const line of this.lines) {
            totalItems += Number(line.quantity);
            totalPrice += (Number(line.price) || 0) * Number(line.quantity);
        }

        // Update Badges
        cartBadges.forEach(badge => {
            badge.textContent = totalItems;
            if (totalItems > 0) {
                badge.classList.remove("hidden");
            } else {
                badge.classList.add("hidden");
            }
        });

        // Update Total Prices
        if (cartTotalDisplay) cartTotalDisplay.textContent = this.formatPrice(totalPrice);
        if (cartSubtotalDisplay) cartSubtotalDisplay.textContent = this.formatPrice(totalPrice);

        // Update Checkout Button State
        if (checkoutBtn) {
            checkoutBtn.disabled = this.lines.length === 0;
            if (this.lines.length === 0) {
                checkoutBtn.classList.add("opacity-50", "cursor-not-allowed");
            } else {
                checkoutBtn.classList.remove("opacity-50", "cursor-not-allowed");
            }
        }

        // Update Form Input for Order Submission
        const form = document.getElementById("form");
        if (form) {
            const inputOrder = form.querySelector('input[name="order"]');
            if (inputOrder) {
                inputOrder.value = JSON.stringify(this.lines);
            }
        }

        // Render Cart List
        if (!panier) return;
        panier.innerHTML = "";

        if (this.lines.length === 0) {
            panier.innerHTML = `
                <div class="flex flex-col items-center justify-center py-16 px-4 text-center space-y-4">
                    <div class="size-20 rounded-full bg-slate-100 flex items-center justify-center text-slate-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-base font-bold text-slate-800">Votre panier est vide</h4>
                        <p class="text-xs text-slate-400 mt-1 max-w-xs">Explorez notre catalogue et ajoutez des articles à votre panier.</p>
                    </div>
                </div>
            `;
            return;
        }

        for (const line of this.lines) {
            const itemSubtotal = (Number(line.price) || 0) * Number(line.quantity);
            const coverImage = line.cover ? line.cover : 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=200&auto=format&fit=crop';

            panier.innerHTML += `
                <div class="bg-slate-50 hover:bg-slate-100/80 p-3.5 rounded-2xl border border-slate-200/80 transition-all duration-200 flex items-center gap-3">
                    <!-- Image Thumbnail -->
                    <div class="size-14 rounded-xl bg-white border border-slate-200 overflow-hidden shrink-0 flex items-center justify-center">
                        <img src="${coverImage}" alt="${line.label}" class="size-full object-cover" onerror="this.src='https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=200&auto=format&fit=crop'" />
                    </div>

                    <!-- Article Info -->
                    <div class="flex-1 min-w-0">
                        <h4 class="font-bold text-slate-900 text-sm truncate">${line.label}</h4>
                        <div class="text-xs text-slate-500 font-medium mt-0.5">
                            ${line.price ? this.formatPrice(line.price) + ' / u' : ''}
                        </div>
                        <div class="text-xs font-extrabold text-indigo-600 mt-1">
                            ${line.price ? this.formatPrice(itemSubtotal) : ''}
                        </div>
                    </div>

                    <!-- Quantity Controls & Delete -->
                    <div class="flex items-center gap-1.5 shrink-0">
                        <div class="flex items-center bg-white border border-slate-200 rounded-xl p-1 shadow-xs">
                            <button id="${line.id}" class="delete size-7 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-slate-900 flex items-center justify-center font-bold text-sm transition-colors cursor-pointer">
                                -
                            </button>
                            <span class="qte-line w-7 text-center font-extrabold text-slate-800 text-xs">
                                ${line.quantity}
                            </span>
                            <button id="${line.id}" data-label="${line.label}" data-price="${line.price || 0}" data-cover="${line.cover || ''}" class="ajouter size-7 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-slate-900 flex items-center justify-center font-bold text-sm transition-colors cursor-pointer">
                                +
                            </button>
                        </div>

                        <button id="${line.id}" class="remove-all p-2 rounded-xl text-rose-500 hover:bg-rose-50 hover:text-rose-600 transition-colors cursor-pointer" title="Supprimer du panier">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            `;
        }
    }

    showToast(label) {
        let toast = document.getElementById("cart-toast");
        if (!toast) {
            toast = document.createElement("div");
            toast.id = "cart-toast";
            toast.className = "fixed bottom-6 right-6 z-50 transform translate-y-10 opacity-0 transition-all duration-300 pointer-events-none";
            document.body.appendChild(toast);
        }

        toast.innerHTML = `
            <div class="bg-slate-900 text-white px-5 py-3.5 rounded-2xl shadow-2xl border border-slate-700 flex items-center gap-3">
                <div class="size-8 rounded-xl bg-indigo-600 flex items-center justify-center text-white font-bold text-sm shrink-0">
                    🛒
                </div>
                <div>
                    <div class="text-xs font-bold">Produit ajouté !</div>
                    <div class="text-xs text-slate-300 font-medium truncate max-w-xs">${label}</div>
                </div>
            </div>
        `;

        // Animate Toast In
        requestAnimationFrame(() => {
            toast.classList.remove("translate-y-10", "opacity-0");
            toast.classList.add("translate-y-0", "opacity-100");
        });

        // Hide after 2.5s
        if (this.toastTimeout) clearTimeout(this.toastTimeout);
        this.toastTimeout = setTimeout(() => {
            toast.classList.remove("translate-y-0", "opacity-100");
            toast.classList.add("translate-y-10", "opacity-0");
        }, 2500);
    }
}

// Global Cart Instance
const cart = new Cart();

// Event Delegation for Add-To-Cart Buttons
document.addEventListener('click', (e) => {
    const btn = e.target.closest('.add-to-cart');
    if (btn) {
        const id = btn.id || btn.dataset.id;
        const label = btn.dataset.label;
        const price = btn.dataset.price || 0;
        const cover = btn.dataset.cover || '';
        if (id && label) {
            cart.addArticle(id, label, price, cover);
        }
    }
});

// Event Delegation inside Cart Drawer (#panier & clear button)
const panierEl = document.getElementById("panier");
if (panierEl) {
    panierEl.addEventListener('click', (e) => {
        const target = e.target.closest('button');
        if (!target) return;

        if (target.classList.contains('delete')) {
            cart.removeArticle(target.id);
        } else if (target.classList.contains('ajouter')) {
            const label = target.dataset.label;
            const price = target.dataset.price;
            const cover = target.dataset.cover;
            cart.addArticle(target.id, label, price, cover);
        } else if (target.classList.contains('remove-all')) {
            cart.deleteArticle(target.id);
        }
    });
}

const clearBtn = document.getElementById("clear-cart-btn");
if (clearBtn) {
    clearBtn.addEventListener('click', () => {
        cart.clearCart();
    });
}

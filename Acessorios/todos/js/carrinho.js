let favorites = [];
let cart = [];

function addToFavorites(productId, productName) {
    const existingItem = favorites.find(item => item.id === productId);

    if (!existingItem) {
        favorites.push({ id: productId, name: productName });
        updateFavoritesCounter();
        updateFavoritesList();
        alert(`Item ${productId} adicionado aos favoritos!`);
    } else {
        alert(`Item ${productId} já está nos favoritos!`);
    }
}

function updateFavoritesCounter() {
    const favoritesCounterDiv = document.getElementById('favorites-counter');
    favoritesCounterDiv.textContent = favorites.length.toString();
}

function updateFavoritesList() {
    const favoritesListDiv = document.getElementById('favorites-list');

    // Limpa o conteúdo anterior
    favoritesListDiv.innerHTML = '';

    // Preenche a lista de favoritos com os itens favoritados
    if (favorites.length > 0) {
        favorites.forEach(item => {
            const listItemDiv = document.createElement('div');
            listItemDiv.innerHTML = `<p>Item ${item.id} - ${item.name}</p>`;
            favoritesListDiv.appendChild(listItemDiv);
        });
    } else {
        favoritesListDiv.innerHTML = '<p>Nenhum item salvo como favorito ainda.</p>';
    }
}

function toggleFavorites() {
    const favoritesModal = document.getElementById('favorites-modal');
    favoritesModal.style.display = (favoritesModal.style.display === 'block') ? 'none' : 'block';


    // Atualiza a lista de favoritos antes de exibir o modal
    updateFavoritesList();

    // Exibe o modal de favoritos
    favoritesModal.style.display = 'block';
}

function addToCart(productId, productName, price) {
    const existingItem = cart.find(item => item.id === productId);

    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({ id: productId, name: productName, price: price, quantity: 1 });
    }

    updateCart();
}

function updateCart() {
    const cartItemsDiv = document.getElementById('cart-items');
    const totalDiv = document.getElementById('total');
    const counterDiv = document.getElementById('cart-counter');

    cartItemsDiv.innerHTML = '';
    let total = 0;
    let itemCount = 0;

    cart.forEach(item => {
        const cartItemDiv = document.createElement('div');
        cartItemDiv.classList.add('cart-item');
        cartItemDiv.innerHTML = `
            <span>${item.name} x${item.quantity}</span>
            <div>
                <button onclick="changeQuantity(${item.id}, -1)">-</button>
                <button onclick="changeQuantity(${item.id}, 1)">+</button>
                <button onclick="addToFavorites(${item.id}, '${item.name}')"><i class="far fa-heart"></i></button>
            </div>
            <span>R$${(item.price * item.quantity).toFixed(2)}</span>
            <button onclick="removeFromCart(${item.id})">Remover</button>
        `;
        cartItemsDiv.appendChild(cartItemDiv);

        total += item.price * item.quantity;
        itemCount += item.quantity;
    });

    totalDiv.textContent = `Total: R$${total.toFixed(2)}`;
    counterDiv.textContent = itemCount.toString();
}

function removeFromCart(productId) {
    cart = cart.filter(item => item.id !== productId);
    updateCart();
}

function changeQuantity(productId, amount) {
    const itemIndex = cart.findIndex(item => item.id === productId);

    if (itemIndex !== -1) {
        // Atualiza a quantidade do item
        cart[itemIndex].quantity += amount;
        // Remove o item se a quantidade for zero ou menos
        if (cart[itemIndex].quantity <= 0) {
            cart.splice(itemIndex, 1);
        }
    }

    updateCart();
}

function toggleCart() {
    const cartModal = document.getElementById('cart-modal');
    cartModal.style.display = (cartModal.style.display === 'block') ? 'none' : 'block';
}

function checkout() {
    alert("Obrigado por sua compra! O pagamento será processado em breve.");
    cart = [];
    updateCart();
}

// Função para adicionar um item aos favoritos (exemplo)
function addToFavoritesList(productId, productName) {
    const favoritesList = document.getElementById('favorites-list');
    const listItem = document.createElement('li');
    listItem.textContent = `${productName} (ID: ${productId})`;
    favoritesList.appendChild(listItem);
}

// Chamada de exemplo para adicionar um item aos favoritos (substitua pelos dados reais)
// Chamada de exemplo para adicionar um item aos favoritos (substitua pelos dados reais)
addToFavoritesList(1, 'Produto A');


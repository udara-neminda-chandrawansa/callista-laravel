<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Product filtering functionality
        const filterButtons = document.querySelectorAll('.tab-btn');
        const productCards = document.querySelectorAll('.product-card');
        
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                filterButtons.forEach(btn => btn.classList.remove('active'));
                // Add active class to clicked button
                this.classList.add('active');
                
                const filter = this.dataset.filter;
                
                productCards.forEach(card => {
                    if (filter === 'all') {
                        card.style.display = 'block';
                    } else {
                        if (card.classList.contains(filter)) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    }
                });
            });
        });
        
        // Quick view functionality
        document.addEventListener('click', function(e) {
            if (e.target.closest('.btn-quick-view')) {
                e.preventDefault();
                e.stopPropagation();
                const productId = e.target.closest('.btn-quick-view').dataset.productId;
                openProductModal(productId);
            }
        });
        
        // Add to cart functionality
        document.addEventListener('click', function(e) {
            if (e.target.closest('.btn-add-to-cart')) {
                e.preventDefault();
                e.stopPropagation();
                const productId = e.target.closest('.btn-add-to-cart').dataset.productId;
                //addToCart(productId);
            }
        });
        
        // Add to wishlist functionality
        document.addEventListener('click', function(e) {
            if (e.target.closest('.btn-add-to-wishlist')) {
                e.preventDefault();
                e.stopPropagation();
                const productId = e.target.closest('.btn-add-to-wishlist').dataset.productId;
                //addToWishlist(productId);
            }
        });
        
        // Modal event handlers
        document.addEventListener('click', function(e) {
            const modal = document.getElementById('productModal');
            if (e.target === modal || e.target.classList.contains('modal-overlay')) {
                closeProductModal();
            }
        });
        
        // Prevent modal content clicks from closing modal
        document.addEventListener('click', function(e) {
            if (e.target.closest('.modal-content')) {
                e.stopPropagation();
            }
        });
        
        // Escape key to close modal
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const modal = document.getElementById('productModal');
                if (modal.classList.contains('active')) {
                    closeProductModal();
                }
            }
        });
        
        // Modal close button using event delegation
        document.addEventListener('click', function(e) {
            if (e.target.closest('#modalCloseBtn')) {
                e.preventDefault();
                e.stopPropagation();
                closeProductModal();
            }
        });
    });

    // Product modal functions
    function openProductModal(productId) {
        const modal = document.getElementById('productModal');
        
        // Show loading state
        modal.style.display = 'flex';
        requestAnimationFrame(() => {
            modal.classList.add('active');
        });
        
        // Fetch product data
        fetch(`/api/products/${productId}`)
            .then(response => response.json())
            .then(product => {
                populateModal(product);
            })
            .catch(error => {
                console.error('Error fetching product:', error);
                //closeProductModal();
            });
    }

    function closeProductModal() {
        const modal = document.getElementById('productModal');
        modal.classList.remove('active');
        setTimeout(() => modal.style.display = 'none', 300);
    }

    function populateModal(product) {
        // Set product name
        document.getElementById('modalProductName').textContent = product.name;
        
        // Set product rating
        const ratingContainer = document.getElementById('modalRating');
        let ratingHtml = '';
        for (let i = 1; i <= 5; i++) {
            if (i <= product.rating) {
                ratingHtml += '<i class="fas fa-star"></i>';
            } else {
                ratingHtml += '<i class="far fa-star"></i>';
            }
        }
        ratingHtml += `<span>(${product.rating})</span>`;
        ratingContainer.innerHTML = ratingHtml;
        
        // Set price
        const priceContainer = document.getElementById('modalPrice');
        let priceHtml = `<span class="price-current">Rs. ${new Intl.NumberFormat().format(product.new_price)}</span>`;
        if (product.old_price && product.old_price > product.new_price) {
            priceHtml += `<span class="price-original">Rs. ${new Intl.NumberFormat().format(product.old_price)}</span>`;
        }
        priceContainer.innerHTML = priceHtml;
        
        // Set meta information
        document.getElementById('modalCategory').textContent = product.type ? product.type.charAt(0).toUpperCase() + product.type.slice(1) : '-';
        document.getElementById('modalVendor').textContent = product.vendor || '-';
        document.getElementById('modalSku').textContent = product.barcode || '-';
        
        // Set stock status
        const stockElement = document.getElementById('modalStock');
        stockElement.textContent = product.stock_status.replace('_', ' ').toUpperCase();
        stockElement.className = `stock-badge ${product.stock_status.replace('_', '-')}`;
        
        // Set description
        document.getElementById('modalDescription').textContent = product.description || 'No description available.';
        
        // Set tags
        // const tagsContainer = document.getElementById('modalTags');
        // if (product.tags && product.tags.length > 0) {
        //     tagsContainer.innerHTML = product.tags.map(tag => `<span class="tag">${tag}</span>`).join('');
        // } else {
        //     tagsContainer.innerHTML = '<span class="tag">No tags</span>';
        // }
        
        // Set images
        if (product.images && product.images.length > 0) {
            console.log(product.images);
            console.log(product.images.length);
            // Main image
            document.getElementById('modalMainImage').src = product.images[0].url;
            document.getElementById('modalMainImage').alt = product.images[0].alt;
            
            // Thumbnails
            const thumbnailsContainer = document.getElementById('modalThumbnails');
            thumbnailsContainer.innerHTML = product.images.map((image, index) => `
                <div class="thumbnail ${index === 0 ? 'active' : ''}" onclick="changeMainImage('${image.url}', ${index})">
                    <img src="${image.url}" alt="${image.alt}">
                </div>
            `).join('');

            console.log();
        } else {
            alert("oops")
        }
        
        // Set up action buttons
        //document.getElementById('modalAddToCart').onclick = () => addToCart(product.id);
        //document.getElementById('modalAddToWishlist').onclick = () => addToWishlist(product.id);
    }

    function changeMainImage(imageUrl, index) {
        document.getElementById('modalMainImage').src = imageUrl;
        
        // Update active thumbnail
        document.querySelectorAll('.thumbnail').forEach((thumb, i) => {
            thumb.classList.toggle('active', i === index);
        });
    }

    function increaseQuantity() {
        const input = document.getElementById('modalQuantity');
        const currentValue = parseInt(input.value);
        const maxValue = parseInt(input.max);
        if (currentValue < maxValue) {
            input.value = currentValue + 1;
        }
    }

    function decreaseQuantity() {
        const input = document.getElementById('modalQuantity');
        const currentValue = parseInt(input.value);
        const minValue = parseInt(input.min);
        if (currentValue > minValue) {
            input.value = currentValue - 1;
        }
    }

    function addToCart(productId) {
        const quantity = document.getElementById('modalQuantity') ? document.getElementById('modalQuantity').value : 1;
        
        // Add your cart logic here
        console.log(`Adding product ${productId} to cart with quantity ${quantity}`);
        
        // Show success message
        showNotification('Product added to cart!', 'success');
    }

    function addToWishlist(productId) {
        // Add your wishlist logic here
        console.log(`Adding product ${productId} to wishlist`);
        
        // Show success message
        showNotification('Product added to wishlist!', 'success');
    }

    function showNotification(message, type = 'info') {
        // Simple notification system
        const notification = document.createElement('div');
        notification.className = `notification ${type}`;
        notification.textContent = message;
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: ${type === 'success' ? '#10b981' : '#3b82f6'};
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            z-index: 10000;
            transition: all 0.3s ease;
            transform: translateX(100%);
        `;
        
        document.body.appendChild(notification);
        
        setTimeout(() => notification.style.transform = 'translateX(0)', 10);
        
        setTimeout(() => {
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }
</script>
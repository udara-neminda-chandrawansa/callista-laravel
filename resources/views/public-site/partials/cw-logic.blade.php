<!--sweetalert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!--jquery-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Set up CSRF token for AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {

        function logCart(){
            $.get('/cart/list', function(response) {
                console.log(response);
            }).fail(function() {
                console.log('Failed to fetch cart list');
            });
        }

        // Refresh cart table content
        function refreshCartTable() {
            // Check if we're on the cart page
            if (window.location.pathname === '/cart') {
                // If on cart page, reload the page to show updated content
                setTimeout(function() {
                    location.reload();
                }, 500);
            } else {
                // For other pages, try to get cart table content
                $.get('/cart/table', function(response) {
                    if ($('#cartTableBody').length && response.html) {
                        $('#cartTableBody').html(response.html);
                    }
                }).fail(function() {
                    console.log('Cart table refresh not available');
                });
            }
        }

        // Refresh cart sidebar/dropdown content
        function refreshCartList() {
            $.get('/cart/list', function(response) {
                if ($('#cart_container').length && response.html) {
                    $('#cart_container').html(response.html);
                }
                console.log(response.items);
            }).fail(function() {
                console.log('Cart list refresh not available');
            });
        }

        // Refresh wishlist table content
        function refreshWishlistTable() {
            $.get('/wishlist/table', function(html) {
                if ($('#wishlistTableBody').length) {
                    $('#wishlistTableBody').html(html);
                }
            }).fail(function() {
                console.log('Wishlist table refresh not available');
            });
        }

        // Update cart count in header/navigation
        function updateCartCount() {
            $.get('/cart/count', function(response) {
                if ($('#cart_btn').length) {
                    $('#cart_btn').text(response.count || 0);
                }
                if ($('.cart-count').length) {
                    $('.cart-count').text(response.count || 0);
                }
            }).fail(function() {
                console.log('Cart count update not available');
            });
        }

        // Update wishlist count in header/navigation
        function updateWishlistCount() {
            $.get('/wishlist/count', function(response) {
                if ($('#wishlist_btn').length) {
                    $('#wishlist_btn').text(response.count || 0);
                }
                if ($('.wishlist-count').length) {
                    $('.wishlist-count').text(response.count || 0);
                }
            }).fail(function() {
                console.log('Wishlist count update not available');
            });
        }

        // Load cart total for display
        function loadCartTotal() {
            $.get('/cart/total', function(response) {
                if ($('#cart-total').length) {
                    $('#cart-total').html(response.total || 'Rs. 0');
                }
            }).fail(function() {
                console.log('Cart total not available');
            });
        }

        // Load wishlist total for display
        function loadWishlistTotal() {
            $.get('/wishlist/total', function(response) {
                if ($('#wishlist-total').length) {
                    $('#wishlist-total').html(response.total || 'Rs. 0');
                }
            }).fail(function() {
                console.log('Wishlist total not available');
            });
        }

        function handleAjaxError(xhr) {
            let message = 'Something went wrong. Please try again.';

            if (xhr.responseJSON && xhr.responseJSON.errors) {
                let errors = xhr.responseJSON.errors;
                message = Object.values(errors).flat().join('\n');
            } else if (xhr.responseJSON && xhr.responseJSON.message) {
                message = xhr.responseJSON.message;
            } else if (xhr.responseText) {
                message = xhr.responseText;
            }

            Swal.fire({
                title: 'Error!',
                text: message,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }

        // Handle quantity increase with event delegation
        $(document).on('click', '.quantity__value.increase', function() {
            const wrapper = $(this).closest('.minicart__product--items');
            const input = wrapper.find('.quantity__number');
            let value = parseInt(input.val()) || 1; // Default to 1 if NaN
            input.val(value + 1);
            updateCartItemQuantity(wrapper);
        });

        // Handle quantity decrease with event delegation
        $(document).on('click', '.quantity__value.decrease', function() {
            const wrapper = $(this).closest('.minicart__product--items');
            const input = wrapper.find('.quantity__number');
            let value = parseInt(input.val()) || 1; // Default to 1 if NaN
            if (value > 1) {
                input.val(value - 1);
                updateCartItemQuantity(wrapper);
            }
        });

        // Handle direct input changes
        $(document).on('change', '.quantity__number', function() {
            const wrapper = $(this).closest('.minicart__product--items');
            let value = parseInt($(this).val()) || 1;
            $(this).val(Math.max(1, value)); // Ensure minimum value is 1
            updateCartItemQuantity(wrapper);
        });

        let updateTimeout;

        // Function to update cart item quantity via AJAX
        function updateCartItemQuantity(wrapperElement) {
            clearTimeout(updateTimeout);
            updateTimeout = setTimeout(function() {
                const productId = wrapperElement.find('.quantity__box').data('product-id');
                const newQuantity = wrapperElement.find('.quantity__number').val();

                // Show loading state
                wrapperElement.find('.quantity__number, .quantity__value').prop('disabled', true);

                $.ajax({
                    url: '/cart/update',
                    method: 'POST',
                    data: {
                        product_id: productId,
                        quantity: newQuantity,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        refreshCartTable();
                        refreshCartList();
                        updateCartCount();
                        loadCartTotal();
                    },
                    error: function(xhr) {
                        let message = 'Failed to update quantity. Please try again.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            message = xhr.responseJSON.message;
                        }
                        Swal.fire('Error!', message, 'error');
                        refreshCartList();
                        refreshCartTable(); // Refresh to get correct values
                    },
                    complete: function() {
                        // Remove loading state
                        wrapperElement.find('.quantity__number, .quantity__value').prop('disabled', false);
                    }
                });
            }, 300);
        }

        // Add to cart with event delegation - supports multiple button classes
        $(document).on('click', '.add-to-cart-button, .btn-add-to-cart, .add-to-cart-btn', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            let productId = $(this).data('product-id') || $(this).closest('[data-product-id]').data('product-id');
            let quantity = $(this).data('quantity') || 1;
            
            if (!productId) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Product ID not found.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }

            // Show loading state
            // $(this).prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Adding...');

            $.ajax({
                url: '/cart/add',
                method: 'POST',
                data: {
                    product_id: productId,
                    quantity: quantity,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    refreshCartTable();
                    refreshCartList();
                    updateCartCount();
                    loadCartTotal();

                    Swal.fire({
                        title: 'Added to Cart!',
                        text: response.message || 'Product added to cart successfully.',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    });

                    logCart();
                },
                error: function(xhr) {
                    handleAjaxError(xhr);
                },
                complete: function() {
                    // Reset button state
                    // $('.add-to-cart-button, .btn-add-to-cart, .add-to-cart-btn').prop('disabled', false).html('<i class="fas fa-shopping-cart"></i> Add to Cart');
                }
            });
        });

        // Remove from cart with event delegation - works globally
        $(document).on('click', '.remove-from-cart-button, .btn-remove-cart', function(e) {
            e.preventDefault();
            
            let productId = $(this).data('product-id') || $(this).data('id');
            
            if (!productId) {
                console.error('Product ID not found for removal');
                return;
            }

            // Show confirmation
            Swal.fire({
                title: 'Remove Item?',
                text: 'Are you sure you want to remove this item from your cart?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, remove it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/cart/remove',
                        method: 'POST',
                        data: {
                            product_id: productId,
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            refreshCartTable();
                            refreshCartList();
                            updateCartCount();
                            loadCartTotal();
                            
                            Swal.fire({
                                title: 'Removed!',
                                text: 'Item removed from cart.',
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false
                            });
                        },
                        error: function(xhr) {
                            handleAjaxError(xhr);
                        }
                    });
                }
            });
        });

        // Clear entire cart - works globally
        $(document).on('click', '.clear-cart, .btn-clear-cart', function(e) {
            e.preventDefault();
            
            Swal.fire({
                title: 'Clear Cart?',
                text: "This will remove all items from your cart. This action cannot be undone.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, clear cart!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/cart/clear',
                        method: 'POST',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            refreshCartTable();
                            refreshCartList();
                            updateCartCount();
                            loadCartTotal();

                            Swal.fire({
                                title: 'Cart Cleared!',
                                text: 'All items have been removed from your cart.',
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        },
                        error: function(xhr) {
                            handleAjaxError(xhr);
                        }
                    });
                }
            });
        });

        // Add to wishlist with event delegation - supports multiple button classes
        $(document).on('click', '.add-to-wishlist-button, .btn-add-to-wishlist, .add-to-wishlist-btn', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            let productId = $(this).data('product-id') || $(this).closest('[data-product-id]').data('product-id');
            
            if (!productId) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Product ID not found.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }

            // Show loading state
            // $(this).prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Adding...');

            $.ajax({
                url: '/wishlist/add',
                method: 'POST',
                data: {
                    product_id: productId,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    refreshWishlistTable();
                    updateWishlistCount();
                    loadWishlistTotal();

                    Swal.fire({
                        title: 'Added to Wishlist!',
                        text: response.message || 'Product added to wishlist successfully.',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    });
                },
                error: function(xhr) {
                    handleAjaxError(xhr);
                },
                complete: function() {
                    // Reset button state
                    // $('.add-to-wishlist-button, .btn-add-to-wishlist, .add-to-wishlist-btn').prop('disabled', false).html('<i class="fas fa-heart"></i> Add to Wishlist');
                }
            });
        });

        // Remove from wishlist with event delegation - works globally
        $(document).on('click', '.remove-from-wishlist, .btn-remove-wishlist', function(e) {
            e.preventDefault();
            
            const productId = $(this).data('product-id') || $(this).data('wishlist-id') || $(this).data('id');
            
            if (!productId) {
                console.error('Product ID not found for wishlist removal');
                return;
            }

            // Show confirmation
            Swal.fire({
                title: 'Remove from Wishlist?',
                text: 'Are you sure you want to remove this item from your wishlist?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, remove it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/wishlist/remove',
                        method: 'POST',
                        data: {
                            product_id: productId,
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            refreshWishlistTable();
                            updateWishlistCount();
                            loadWishlistTotal();

                            Swal.fire({
                                title: 'Removed!',
                                text: 'Item removed from wishlist.',
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false
                            });
                        },
                        error: function(xhr) {
                            handleAjaxError(xhr);
                        }
                    });
                }
            });
        });

        // Trigger quick view - supports multiple trigger classes
        $(document).on('click', '.quickviewTrigger, .btn-quick-view, .quick-view-btn', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            let productId = $(this).data('product-id') || $(this).closest('[data-product-id]').data('product-id');

            if (!productId) {
                console.error('Product ID not found for quick view');
                return;
            }

            // AJAX request to get the product data
            $.ajax({
                url: `/api/products/${productId}`,
                method: 'GET',
                success: function(response) {
                    console.log('Product data received:', response);
                    
                    // Update modal content if elements exist
                    if ($('#prodName').length) $('#prodName').text(response.name || 'Product Name');
                    if ($('#prodDesc').length) $('#prodDesc').text(response.description || 'Product Description');
                    if ($('#prodOldPrice').length) $('#prodOldPrice').text(response.old_price ? `Rs. ${response.old_price.toLocaleString()}` : '');
                    if ($('#prodNewPrice').length) $('#prodNewPrice').text(`Rs. ${response.new_price.toLocaleString()}`);
                    if ($('#prodRating').length) $('#prodRating').text(response.rating || '0');

                    const images = response.images || [];
                    let bigSlider = '';
                    let smallSlider = '';

                    if (images.length > 0) {
                        images.forEach(image => {
                            const imageUrl = image.url || `/uploads/products/images/${image.image}`;
                            
                            bigSlider += `
                                <div class="swiper-slide">
                                    <div class="product__media--preview__items">
                                        <a class="product__media--preview__items--link glightbox"
                                            data-gallery="product-media-preview"
                                            href="${imageUrl}">
                                            <img class="product__media--preview__items--img aspect-square"
                                                src="${imageUrl}"
                                                alt="${response.name}">
                                        </a>
                                        <div class="product__media--view__icon">
                                            <a class="product__media--view__icon--link glightbox"
                                                href="${imageUrl}"
                                                data-gallery="product-media-preview">
                                                <svg class="product__media--view__icon--svg"
                                                    xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443"
                                                    viewBox="0 0 512 512">
                                                    <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                        fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                        stroke-width="32"></path>
                                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-miterlimit="10" stroke-width="32"
                                                        d="M338.29 338.29L448 448"></path>
                                                </svg>
                                                <span class="visually-hidden">Media Gallery</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            `;

                            smallSlider += `
                                <div class="swiper-slide">
                                    <div class="product__media--nav__items">
                                        <img class="product__media--nav__items--img aspect-square"
                                            src="${imageUrl}" alt="${response.name}">
                                    </div>
                                </div>
                            `;
                        });
                    } else {
                        // Default placeholder image
                        const placeholderImg = '/assets/placeholder-product.jpg';
                        bigSlider = `
                            <div class="swiper-slide">
                                <div class="product__media--preview__items">
                                    <img class="product__media--preview__items--img aspect-square"
                                        src="${placeholderImg}" alt="${response.name}">
                                </div>
                            </div>
                        `;
                        smallSlider = `
                            <div class="swiper-slide">
                                <div class="product__media--nav__items">
                                    <img class="product__media--nav__items--img aspect-square"
                                        src="${placeholderImg}" alt="${response.name}">
                                </div>
                            </div>
                        `;
                    }

                    if ($('#bigImages').length) $('#bigImages').html(bigSlider);
                    if ($('#smallImages').length) $('#smallImages').html(smallSlider);

                    // Initialize Swiper if available
                    if (typeof Swiper !== 'undefined') {
                        try {
                            // Destroy existing swipers if they exist
                            if (window.swiper) window.swiper.destroy(true, true);
                            if (window.swiper2) window.swiper2.destroy(true, true);

                            // Create new swipers
                            window.swiper = new Swiper(".product__media--nav2", {
                                loop: true,
                                spaceBetween: 10,
                                slidesPerView: 5,
                                freeMode: true,
                                watchSlidesProgress: true,
                                breakpoints: {
                                    768: { slidesPerView: 5 },
                                    480: { slidesPerView: 4 },
                                    320: { slidesPerView: 3 },
                                    200: { slidesPerView: 2 },
                                    0: { slidesPerView: 1 }
                                },
                                navigation: {
                                    nextEl: ".swiper-button-next",
                                    prevEl: ".swiper-button-prev"
                                }
                            });

                            window.swiper2 = new Swiper(".product__media--preview2", {
                                loop: true,
                                spaceBetween: 10,
                                thumbs: {
                                    swiper: window.swiper
                                }
                            });
                        } catch (e) {
                            console.log('Swiper initialization failed:', e);
                        }
                    }

                    // Initialize GLightbox if available
                    if (typeof GLightbox !== 'undefined') {
                        try {
                            const lightbox = GLightbox({
                                touchNavigation: true,
                                loop: true
                            });
                        } catch (e) {
                            console.log('GLightbox initialization failed:', e);
                        }
                    }

                    // Show modal if it exists
                    if ($('#productModal').length) {
                        $('#productModal').addClass('active').show();
                    } else if ($('#modal1').length) {
                        $('#modal1').addClass('visible').show();
                    }

                },
                error: function(xhr) {
                    console.error('Quick view failed:', xhr);
                    handleAjaxError(xhr);
                }
            });
        });

        // Initialize cart and wishlist counts on page load
        $(document).ready(function() {
            updateCartCount();
            updateWishlistCount();
            loadCartTotal();
            loadWishlistTotal();
        });
    });
</script>
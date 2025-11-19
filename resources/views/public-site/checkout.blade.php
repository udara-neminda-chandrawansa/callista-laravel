@extends('layouts.public-site')

@section('content')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/checkout.css') }}">
@endpush

<!-- Checkout Page Header -->
<section class="cart-header">
    <div class="container">
        <div class="breadcrumb">
            <a href="/"><i class="fas fa-home"></i> Home</a>
            <span class="separator">/</span>
            <span class="current">Checkout</span>
        </div>
        <h1>Checkout</h1>
        <p class="cart-count-text"><span id="cartItemCount">{{ $cartCount }}</span> {{ $cartCount == 1 ? 'item' :
            'items' }} in your cart</p>
    </div>
</section>

<!-- Checkout Content -->
<section class="checkout-content">
    <div class="container">
        <form action="{{ route('checkout.store') }}" method="POST" id="checkout-form">
            @csrf
            <div class="checkout-layout">

                <!-- Billing Information -->
                <div class="checkout-main">
                    <div class="billing-section">
                        <h2><i class="fas fa-user"></i> Billing Information</h2>

                        @auth
                        @if($billingData)
                        <div class="saved-address-notice">
                            <i class="fas fa-info-circle"></i>
                            <span>Using your saved billing information. You can update it below if needed.</span>
                        </div>
                        @endif
                        @endauth

                        <div class="form-grid">
                            <div class="form-group">
                                <label for="first_name">First Name *</label>
                                <input type="text" id="first_name" name="first_name"
                                    value="{{ old('first_name', $billingData->first_name ?? '') }}" required>
                                @error('first_name')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="last_name">Last Name *</label>
                                <input type="text" id="last_name" name="last_name"
                                    value="{{ old('last_name', $billingData->last_name ?? '') }}" required>
                                @error('last_name')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group full-width">
                                <label for="company_name">Company Name (Optional)</label>
                                <input type="text" id="company_name" name="company_name"
                                    value="{{ old('company_name', $billingData->company_name ?? '') }}">
                                @error('company_name')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group full-width">
                                <label for="address_1">Street Address *</label>
                                <input type="text" id="address_1" name="address_1"
                                    value="{{ old('address_1', $billingData->address_1 ?? '') }}"
                                    placeholder="House number and street name" required>
                                @error('address_1')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group full-width">
                                <label for="address_2">Apartment, suite, etc. (Optional)</label>
                                <input type="text" id="address_2" name="address_2"
                                    value="{{ old('address_2', $billingData->address_2 ?? '') }}"
                                    placeholder="Apartment, suite, unit, building, floor, etc.">
                                @error('address_2')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="town">Town / City *</label>
                                <input type="text" id="town" name="town"
                                    value="{{ old('town', $billingData->town ?? '') }}" required>
                                @error('town')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="postal_code">Postal Code *</label>
                                <input type="text" id="postal_code" name="postal_code"
                                    value="{{ old('postal_code', $billingData->postal_code ?? '') }}" required>
                                @error('postal_code')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group full-width">
                                <label for="phone">Phone Number *</label>
                                <input type="tel" id="phone" name="phone"
                                    value="{{ old('phone', Auth::user()->phone ?? '') }}" placeholder="+94 77 123 4567"
                                    required>
                                @error('phone')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group full-width">
                                <label for="email">Email Address *</label>
                                <input type="email" id="email" name="email"
                                    value="{{ old('email', Auth::user()->email ?? '') }}" required>
                                @error('email')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group full-width">
                                <label for="notes">Order Notes (Optional)</label>
                                <textarea id="notes" name="notes" rows="4"
                                    placeholder="Special delivery instructions, etc.">{{ old('notes') }}</textarea>
                                @error('notes')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        @auth
                        <div class="save-address-option">
                            <label class="checkbox-label">
                                <input type="checkbox" name="save_billing_data" value="1" checked>
                                <span class="checkmark"></span>
                                Save this information for faster checkout next time
                            </label>
                        </div>
                        @endauth
                    </div>

                    <!-- Payment Method -->
                    <div class="payment-section">
                        <h2><i class="fas fa-credit-card"></i> Payment Method</h2>

                        <div class="payment-methods">
                            <div class="payment-method">
                                <label class="radio-label">
                                    <input type="radio" name="payment_method" value="card_payment" checked>
                                    <span class="radio-mark"></span>
                                    <div class="payment-info">
                                        <h4>Credit/Debit Card</h4>
                                        <p>Pay securely with your credit or debit card</p>
                                        <div class="card-icons">
                                            <i class="fab fa-cc-visa"></i>
                                            <i class="fab fa-cc-mastercard"></i>
                                            <i class="fab fa-cc-amex"></i>
                                        </div>
                                    </div>
                                </label>
                            </div>

                            <div class="payment-method">
                                <label class="radio-label">
                                    <input type="radio" name="payment_method" value="bank_transfer">
                                    <span class="radio-mark"></span>
                                    <div class="payment-info">
                                        <h4>Bank Transfer</h4>
                                        <p>Transfer to our bank account and upload the slip</p>
                                        <small>You'll be provided with bank details after order confirmation</small>
                                    </div>
                                </label>
                            </div>

                            <div class="payment-method">
                                <label class="radio-label">
                                    <input type="radio" name="payment_method" value="cash_on_delivery">
                                    <span class="radio-mark"></span>
                                    <div class="payment-info">
                                        <h4>Cash on Delivery</h4>
                                        <p>Pay when your order is delivered</p>
                                        <small>Additional charges may apply</small>
                                    </div>
                                </label>
                            </div>
                        </div>

                        @error('payment_method')
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="checkout-sidebar">
                    <div class="order-summary">
                        <h3>Your Order</h3>

                        <div class="order-items">
                            @foreach($cartItemsWithDetails as $item)
                            <div class="order-item">
                                <div class="item-image">
                                    @if($item->product->images && $item->product->images->count() > 0)
                                    <img src="{{ asset('' . $item->product->images->first()->image) }}"
                                        alt="{{ $item->name }}">
                                    @else
                                    <img src="{{ asset('assets/images/placeholder.jpg') }}" alt="{{ $item->name }}">
                                    @endif
                                </div>
                                <div class="item-details">
                                    <h4>{{ $item->name }}</h4>
                                    <p>Qty: {{ $item->quantity }}</p>
                                    @if($item->product->old_price && $item->product->old_price >
                                    $item->product->new_price)
                                    <span class="item-discount">Save LKR {{ number_format($item->item_discount)
                                        }}</span>
                                    @endif
                                </div>
                                <div class="item-price">
                                    <span>LKR {{ number_format($item->product->new_price * $item->quantity) }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="order-totals">
                            <div class="total-row">
                                <span>Subtotal ({{ $cartCount }} items)</span>
                                <span>LKR {{ number_format($subtotal) }}</span>
                            </div>

                            @if($totalDiscount > 0)
                            <div class="total-row discount">
                                <span>Discount</span>
                                <span>- LKR {{ number_format($totalDiscount) }}</span>
                            </div>
                            @endif

                            <div class="total-row">
                                <span>Delivery Fee</span>
                                <span>
                                    @if($deliveryFee > 0)
                                    LKR {{ number_format($deliveryFee) }}
                                    @else
                                    <span class="free">Free</span>
                                    @endif
                                </span>
                            </div>

                            <div class="total-row final-total">
                                <span>Total</span>
                                <span>LKR {{ number_format($finalTotal) }}</span>
                            </div>

                            @if($totalDiscount > 0)
                            <div class="savings-info">
                                <i class="fas fa-tag"></i>
                                You're saving LKR {{ number_format($totalDiscount) }}!
                            </div>
                            @endif
                        </div>

                        <div class="checkout-actions">
                            <button type="submit" class="btn btn-primary btn-full" id="place-order-btn">
                                <i class="fas fa-lock"></i> Place Order
                            </button>

                            <div class="security-info">
                                <div class="security-badges">
                                    <span><i class="fas fa-shield-alt"></i> SSL Secured</span>
                                    <span><i class="fas fa-lock"></i> Safe Payment</span>
                                </div>
                                <p class="terms">
                                    By placing your order, you agree to our
                                    <a href="#">Terms & Conditions</a> and
                                    <a href="#">Privacy Policy</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</section>

@push('scripts')
<script>
    $(document).ready(function() {
    // Form validation
    $('#checkout-form').on('submit', function(e) {
        let isValid = true;
        const requiredFields = ['first_name', 'last_name', 'address_1', 'town', 'postal_code', 'phone', 'email'];
        
        requiredFields.forEach(function(field) {
            const input = $(`#${field}`);
            if (!input.val().trim()) {
                isValid = false;
                input.addClass('error');
                if (!input.next('.error-message').length) {
                    input.after('<span class="error-message">This field is required</span>');
                }
            } else {
                input.removeClass('error');
                input.next('.error-message').remove();
            }
        });

        // Email validation
        const email = $('#email').val();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email && !emailRegex.test(email)) {
            isValid = false;
            $('#email').addClass('error');
            if (!$('#email').next('.error-message').length) {
                $('#email').after('<span class="error-message">Please enter a valid email address</span>');
            }
        }

        // Phone validation (basic Sri Lankan format)
        const phone = $('#phone').val();
        const phoneRegex = /^(\+94|0)[0-9]{9}$/;
        if (phone && !phoneRegex.test(phone.replace(/\s/g, ''))) {
            isValid = false;
            $('#phone').addClass('error');
            if (!$('#phone').next('.error-message').length) {
                $('#phone').after('<span class="error-message">Please enter a valid phone number</span>');
            }
        }

        if (!isValid) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: $('.error').first().offset().top - 100
            }, 500);
        } else {
            // Show loading state
            $('#place-order-btn').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Processing...');
        }
    });

    // Remove error styling on input
    $('.form-group input, .form-group textarea').on('input', function() {
        $(this).removeClass('error');
        $(this).next('.error-message').remove();
    });

    // Payment method change effects
    $('input[name="payment_method"]').on('change', function() {
        $('.payment-method').removeClass('selected');
        $(this).closest('.payment-method').addClass('selected');
    });

    // Set initial selected payment method
    $('input[name="payment_method"]:checked').closest('.payment-method').addClass('selected');
});
</script>
@endpush

@endsection
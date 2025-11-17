@extends('layouts.public-site')

@section('content')

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-overlay"></div>
    <div class="container">
        <div class="hero-content">
            <div class="hero-icon">
                <i class="fas fa-tools"></i>
            </div>
            <h1>Custom Furniture</h1>
            <p>Bring your vision to life with handcrafted, made-to-order furniture</p>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="how-it-works">
    <div class="container">
        <h2>How It Works</h2>
        <div class="steps-container">
            <div class="step">
                <div class="step-number">1</div>
                <h3>Submit Request</h3>
                <p>Tell us your requirements</p>
            </div>
            <div class="step">
                <div class="step-number">2</div>
                <h3>Consultation</h3>
                <p>We discuss design & materials</p>
            </div>
            <div class="step">
                <div class="step-number">3</div>
                <h3>Quotation</h3>
                <p>Receive detailed pricing</p>
            </div>
            <div class="step">
                <div class="step-number">4</div>
                <h3>Crafting</h3>
                <p>Our artisans build your piece</p>
            </div>
            <div class="step">
                <div class="step-number">5</div>
                <h3>Delivery</h3>
                <p>Your custom furniture arrives</p>
            </div>
        </div>
    </div>
</section>

<!-- Custom Request Form -->
<section class="request-form-section">
    <div class="container">
        <div class="form-header">
            <h2>Request Your Custom Piece</h2>
        </div>

        <form class="custom-form" id="customForm">
            <div class="form-container">
                <!-- Contact Information -->
                <div class="form-section">
                    <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input type="text" id="fullName" name="fullName" placeholder="John Doe" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="john@example.com" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" id="phone" name="phone" placeholder="+94 77 123 4567" required>
                        </div>
                    </div>
                </div>

                <!-- Furniture Details -->
                <div class="form-section">
                    <div class="form-group">
                        <label for="furnitureType">Furniture Type</label>
                        <input type="text" id="furnitureType" name="furnitureType"
                            placeholder="e.g., Dining Table, Wardrobe, Bed" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="dimensions">Dimensions (Optional)</label>
                            <input type="text" id="dimensions" name="dimensions" placeholder="e.g., 6ft x 3ft x 2ft">
                        </div>
                        <div class="form-group">
                            <label for="materials">Preferred Materials (Optional)</label>
                            <input type="text" id="materials" name="materials" placeholder="e.g., Teak, Mahogany">
                        </div>
                    </div>
                </div>

                <!-- Design Description -->
                <div class="form-section">
                    <div class="form-group">
                        <label for="designDescription">Design Description</label>
                        <textarea id="designDescription" name="designDescription" rows="6"
                            placeholder="Describe your vision, style preferences, and any specific requirements..."
                            required></textarea>
                    </div>
                </div>

                <!-- File Upload -->
                <div class="form-section">
                    <div class="form-group">
                        <label for="referenceImages">Reference Images (Optional)</label>
                        <div class="file-upload-area" id="fileUploadArea">
                            <input type="file" id="referenceImages" name="referenceImages" multiple accept="image/*"
                                hidden>
                            <div class="upload-content">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <p>Click to upload or drag and drop</p>
                                <span>PNG, JPG, JPEG up to 10MB each</span>
                            </div>
                        </div>
                        <div class="uploaded-files" id="uploadedFiles"></div>
                    </div>
                </div>

                <!-- Budget Range -->
                <div class="form-section">
                    <div class="form-group">
                        <label for="budget">Expected Budget Range</label>
                        <select id="budget" name="budget">
                            <option value="">Select budget range</option>
                            <option value="50000-100000">LKR 50,000 - 100,000</option>
                            <option value="100000-200000">LKR 100,000 - 200,000</option>
                            <option value="200000-500000">LKR 200,000 - 500,000</option>
                            <option value="500000+">Above LKR 500,000</option>
                        </select>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="form-actions">
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-paper-plane"></i>
                        Submit Request
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- Why Choose Custom Section -->
<section class="why-custom-section">
    <div class="container">
        <h2>Why Choose Custom?</h2>
        <div class="benefits-grid">
            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h3>Perfect Fit</h3>
                <p>Designed exactly for your space and needs</p>
            </div>
            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h3>Premium Quality</h3>
                <p>Handcrafted by skilled artisans</p>
            </div>
            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h3>Your Style</h3>
                <p>Complete control over design and materials</p>
            </div>
        </div>
    </div>
</section>

@endsection
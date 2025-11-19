@extends('layouts.public-site')

@section('content')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/customize.css') }}">
@endpush

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

        <form class="custom-form" id="customForm" method="POST" enctype="multipart/form-data">
            @csrf
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

@push('scripts')
<script>
// Global variable for selected files
let selectedFiles = [];

// File upload functionality
document.addEventListener('DOMContentLoaded', function() {
    const fileUploadArea = document.getElementById('fileUploadArea');
    const fileInput = document.getElementById('referenceImages');
    const uploadedFilesDiv = document.getElementById('uploadedFiles');

    // Click to upload
    fileUploadArea.addEventListener('click', function() {
        fileInput.click();
    });

    // Drag and drop functionality
    fileUploadArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        fileUploadArea.classList.add('drag-over');
    });

    fileUploadArea.addEventListener('dragleave', function(e) {
        e.preventDefault();
        fileUploadArea.classList.remove('drag-over');
    });

    fileUploadArea.addEventListener('drop', function(e) {
        e.preventDefault();
        fileUploadArea.classList.remove('drag-over');
        
        const files = Array.from(e.dataTransfer.files).filter(file => 
            file.type.startsWith('image/')
        );
        
        handleFiles(files);
    });

    // File input change
    fileInput.addEventListener('change', function() {
        handleFiles(Array.from(this.files));
    });

    function handleFiles(files) {
        files.forEach(file => {
            if (file.size > 10 * 1024 * 1024) { // 10MB limit
                alert(`File ${file.name} is too large. Maximum size is 10MB.`);
                return;
            }
            
            if (selectedFiles.length >= 5) {
                alert('Maximum 5 images allowed.');
                return;
            }
            
            selectedFiles.push(file);
            displayFile(file);
        });
        
        updateFileInput();
    }

    function displayFile(file) {
        const fileDiv = document.createElement('div');
        fileDiv.className = 'uploaded-file';
        
        const reader = new FileReader();
        reader.onload = function(e) {
            fileDiv.innerHTML = `
                <img src="${e.target.result}" alt="${file.name}">
                <div class="file-info">
                    <span class="file-name">${file.name}</span>
                    <span class="file-size">${(file.size / 1024 / 1024).toFixed(2)} MB</span>
                </div>
                <button type="button" class="remove-file" onclick="removeFile(this, '${file.name}')">
                    <i class="fas fa-times"></i>
                </button>
            `;
        };
        reader.readAsDataURL(file);
        
        uploadedFilesDiv.appendChild(fileDiv);
    }

    function updateFileInput() {
        const dt = new DataTransfer();
        selectedFiles.forEach(file => dt.items.add(file));
        fileInput.files = dt.files;
    }

    // Make removeFile globally accessible
    window.removeFile = function(button, fileName) {
        selectedFiles = selectedFiles.filter(file => file.name !== fileName);
        button.closest('.uploaded-file').remove();
        updateFileInput();
    };
});

// Form submission
document.getElementById('customForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Show loading state
    const submitBtn = this.querySelector('.submit-btn');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';
    submitBtn.disabled = true;
    
    // Create FormData object
    const formData = new FormData();
    
    // Add all form fields manually
    formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
    formData.append('fullName', document.getElementById('fullName').value);
    formData.append('email', document.getElementById('email').value);
    formData.append('phone', document.getElementById('phone').value);
    formData.append('furnitureType', document.getElementById('furnitureType').value);
    formData.append('dimensions', document.getElementById('dimensions').value);
    formData.append('materials', document.getElementById('materials').value);
    formData.append('designDescription', document.getElementById('designDescription').value);
    formData.append('budget', document.getElementById('budget').value);
    
    // Add files from both selectedFiles array and file input as fallback
    if (selectedFiles && selectedFiles.length > 0) {
        selectedFiles.forEach((file, index) => {
            formData.append('referenceImages[]', file);
        });
    } else {
        // Fallback: get files from file input
        const fileInput = document.getElementById('referenceImages');
        if (fileInput.files && fileInput.files.length > 0) {
            Array.from(fileInput.files).forEach(file => {
                formData.append('referenceImages[]', file);
            });
        }
    }
    
    // Submit the form
    fetch('{{ route("customize.store") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                title: 'Request Submitted!',
                text: data.message,
                icon: 'success',
                confirmButtonColor: '#059669',
                confirmButtonText: 'OK'
            }).then(() => {
                // Reset form
                document.getElementById('customForm').reset();
                document.getElementById('uploadedFiles').innerHTML = '';
                selectedFiles = [];
            });
        } else {
            Swal.fire({
                title: 'Error!',
                text: data.message,
                icon: 'error',
                confirmButtonColor: '#dc2626',
                confirmButtonText: 'Try Again'
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            title: 'Error!',
            text: 'An unexpected error occurred. Please try again.',
            icon: 'error',
            confirmButtonColor: '#dc2626',
            confirmButtonText: 'OK'
        });
    })
    .finally(() => {
        // Restore button state
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    });
});
</script>
@endpush

<style>
/* File upload styles */
.file-upload-area {
    border: 2px dashed #d1d5db;
    border-radius: 8px;
    padding: 40px 20px;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
    background: #fafafa;
}

.file-upload-area:hover,
.file-upload-area.drag-over {
    border-color: #667eea;
    background: #f0f4ff;
}

.upload-content i {
    font-size: 3rem;
    color: #9ca3af;
    margin-bottom: 16px;
    display: block;
}

.upload-content p {
    font-size: 1.1rem;
    color: #374151;
    margin-bottom: 8px;
}

.upload-content span {
    font-size: 0.9rem;
    color: #6b7280;
}

.uploaded-files {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
    gap: 16px;
    margin-top: 16px;
}

.uploaded-file {
    position: relative;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    overflow: hidden;
    background: white;
}

.uploaded-file img {
    width: 100%;
    height: 100px;
    object-fit: cover;
}

.file-info {
    padding: 8px;
    text-align: left;
}

.file-name {
    display: block;
    font-size: 0.8rem;
    font-weight: 600;
    color: #374151;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.file-size {
    font-size: 0.7rem;
    color: #6b7280;
}

.remove-file {
    position: absolute;
    top: 4px;
    right: 4px;
    background: rgba(220, 38, 38, 0.9);
    color: white;
    border: none;
    border-radius: 50%;
    width: 24px;
    height: 24px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
}

.remove-file:hover {
    background: rgba(220, 38, 38, 1);
}

/* Form styles */
/* .custom-form {
    max-width: 800px;
    margin: 0 auto;
    background: white;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
} */

.form-section {
    margin-bottom: 32px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #374151;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid #e5e7eb;
    border-radius: 8px;
    font-size: 1rem;
    transition: border-color 0.3s ease;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.submit-btn {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    padding: 16px 32px;
    border-radius: 8px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
    margin: 0 auto;
}

.submit-btn:hover:not(:disabled) {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
}

.submit-btn:disabled {
    opacity: 0.7;
    cursor: not-allowed;
}

@media (max-width: 768px) {
    .form-row {
        grid-template-columns: 1fr;
    }
    
    /* .custom-form {
        margin: 20px;
        padding: 24px;
    } */
    
    .uploaded-files {
        grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
    }
}
</style>

@endsection
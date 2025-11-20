<div class="request-details">
    <div class="detail-section">
        <h3><i class="fas fa-user"></i> Customer Information</h3>
        <div class="detail-grid">
            <div class="detail-item">
                <label>Full Name:</label>
                <span>{{ $customRequest->full_name }}</span>
            </div>
            <div class="detail-item">
                <label>Email:</label>
                <span>{{ $customRequest->email }}</span>
            </div>
            <div class="detail-item">
                <label>Phone:</label>
                <span>{{ $customRequest->phone }}</span>
            </div>
        </div>
    </div>

    <div class="detail-section">
        <h3><i class="fas fa-couch"></i> Furniture Details</h3>
        <div class="detail-grid">
            <div class="detail-item">
                <label>Furniture Type:</label>
                <span>{{ $customRequest->furniture_type }}</span>
            </div>
            <div class="detail-item">
                <label>Dimensions:</label>
                <span>{{ $customRequest->dimensions ?: 'Not specified' }}</span>
            </div>
            <div class="detail-item">
                <label>Materials:</label>
                <span>{{ $customRequest->materials ?: 'Not specified' }}</span>
            </div>
            <div class="detail-item full-width">
                <label>Design Description:</label>
                <p>{{ $customRequest->design_description }}</p>
            </div>
        </div>
    </div>

    <div class="detail-section">
        <h3><i class="fas fa-dollar-sign"></i> Budget & Pricing</h3>
        <div class="detail-grid">
            <div class="detail-item">
                <label>Customer Budget:</label>
                <span>{{ $customRequest->budget ? 'LKR ' . $customRequest->budget : 'Not specified' }}</span>
            </div>
            @if($customRequest->quoted_price)
            <div class="detail-item">
                <label>Quoted Price:</label>
                <span class="text-success font-weight-bold">LKR {{ number_format($customRequest->quoted_price) }}</span>
            </div>
            @endif
        </div>
    </div>

    <div class="detail-section">
        <h3><i class="fas fa-info-circle"></i> Request Status</h3>
        <div class="detail-grid">
            <div class="detail-item">
                <label>Current Status:</label>
                <span class="status-badge status-{{ strtolower(str_replace('_', '-', $customRequest->status)) }}">
                    {{ ucfirst(str_replace('_', ' ', $customRequest->status)) }}
                </span>
            </div>
            <div class="detail-item">
                <label>Request Date:</label>
                <span>{{ $customRequest->created_at->format('F j, Y \a\t g:i A') }}</span>
            </div>
            @if($customRequest->admin_notes)
            <div class="detail-item full-width">
                <label>Admin Notes:</label>
                <p>{{ $customRequest->admin_notes }}</p>
            </div>
            @endif
        </div>
    </div>

    @if($customRequest->reference_images && count($customRequest->reference_images) > 0)
    <div class="detail-section">
        <h3><i class="fas fa-images"></i> Reference Images</h3>
        <div class="reference-images">
            @foreach($customRequest->reference_images as $image)
            <div class="reference-image">
                <img src="{{ asset($image) }}" alt="Reference Image" onclick="openImageModal('{{ asset($image) }}')">
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>

<!-- Image Modal for larger view -->
<div id="imageModal" class="image-modal" onclick="closeImageModal()">
    <div class="image-modal-content">
        <img id="modalImage" src="" alt="Reference Image">
        <span class="image-close" onclick="closeImageModal()">&times;</span>
    </div>
</div>

<style>
.request-details {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

.detail-section {
    margin-bottom: 24px;
    padding: 16px;
    background: #f8fafc;
    border-radius: 8px;
    border-left: 4px solid #667eea;
}

.detail-section h3 {
    margin: 0 0 16px 0;
    color: #374151;
    font-size: 1.1rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
}

.detail-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
}

.detail-item {
    display: flex;
    flex-direction: column;
}

.detail-item.full-width {
    grid-column: span 2;
}

.detail-item label {
    font-weight: 600;
    color: #6b7280;
    font-size: 0.9rem;
    margin-bottom: 4px;
}

.detail-item span {
    color: #374151;
    font-size: 1rem;
}

.detail-item p {
    color: #374151;
    margin: 0;
    line-height: 1.5;
    padding: 8px 12px;
    background: white;
    border-radius: 4px;
    border: 1px solid #e5e7eb;
}

.status-badge {
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    text-transform: capitalize;
    display: inline-block;
}

.reference-images {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
    gap: 12px;
    margin-top: 8px;
}

.reference-image {
    position: relative;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    transition: transform 0.2s ease;
}

.reference-image:hover {
    transform: scale(1.05);
}

.reference-image img {
    width: 100%;
    height: 120px;
    object-fit: cover;
    display: block;
}

.image-modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
}

.image-modal-content {
    position: relative;
    margin: 5% auto;
    width: 90%;
    max-width: 800px;
    text-align: center;
}

.image-modal-content img {
    width: 100%;
    height: auto;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
}

.image-close {
    position: absolute;
    top: -40px;
    right: 0;
    color: white;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
    background: rgba(0, 0, 0, 0.5);
    padding: 4px 12px;
    border-radius: 4px;
}

.image-close:hover {
    background: rgba(0, 0, 0, 0.7);
}

@media (max-width: 768px) {
    .detail-grid {
        grid-template-columns: 1fr;
    }
    
    .detail-item.full-width {
        grid-column: span 1;
    }
    
    .reference-images {
        grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
    }
}
</style>

<script>
function openImageModal(imageSrc) {
    document.getElementById('modalImage').src = imageSrc;
    document.getElementById('imageModal').style.display = 'block';
}

function closeImageModal() {
    document.getElementById('imageModal').style.display = 'none';
}
</script>

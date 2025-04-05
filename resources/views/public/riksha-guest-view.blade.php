<div style="max-width: 800px; margin: 0 auto; background-color: #ffffff; padding: 32px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
    <h2 style="font-size: 24px; font-weight: 600; margin-bottom: 24px; border-bottom: 2px solid #e5e7eb; padding-bottom: 8px; color: #333;">Riksha Information</h2>
    
    <div style="margin-bottom: 16px;">
        <p style="font-size: 18px; color: #4b5563;">
            <strong style="font-weight: 500; color: #1f2937;">Riksha ID:</strong> 
            <span style="color: #6b7280;">{{ $riksha->riksha_id }}</span>
        </p>
    </div>
    
    <div style="margin-bottom: 16px;">
        <p style="font-size: 18px; color: #4b5563;">
            <strong style="font-weight: 500; color: #1f2937;">Status:</strong> 
            <span style="color: #6b7280;">{{ $riksha->status ? 'Active' : 'Inactive' }}</span>
        </p>
    </div>
    
    <div style="margin-bottom: 16px;">
        <p style="font-size: 18px; color: #4b5563;">
            <strong style="font-weight: 500; color: #1f2937;">Puller Name:</strong> 
            <span style="color: #6b7280;">{{ $riksha->puller ? $riksha->puller->name : 'Not Assigned' }}</span>
        </p>
    </div>

    <p style="color: #6b7280; margin-top: 16px; font-size: 14px;">
        Log in to view more details.
    </p>


</div>

document.addEventListener('DOMContentLoaded', function() {
    const dropZone = document.querySelector('.upload-box');
    const fileInput = document.getElementById('file-input');
    const uploadButton = document.querySelector('.btn-upload');
    const heroContent = document.querySelector('.hero-content');
    const heroImage = document.querySelector('.hero-image img');
    const browseText = document.querySelector('.browse-text');
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const mobileMenu = document.querySelector('.mobile-menu');
    const mobileMenuClose = document.querySelector('.mobile-menu-close');
    const mobileMenuLinks = document.querySelectorAll('.mobile-menu-link');

    // ایجاد المان‌های مورد نیاز برای نمایش وضعیت
    const statusContainer = document.createElement('div');
    statusContainer.className = 'upload-status';
    statusContainer.innerHTML = `
        <div class="preview-container" style="display: none;">
            <img class="preview-image" src="" alt="پیش‌نمایش">
            <div class="loading-spinner" style="display: none;">
                <div class="spinner"></div>
                <p>در حال پردازش تصویر...</p>
            </div>
        </div>
    `;
    heroContent.appendChild(statusContainer);

    // اضافه کردن استایل‌های مورد نیاز
    const style = document.createElement('style');
    style.textContent = `
        .upload-status {
            margin-top: 2rem;
        }
        .preview-container {
            max-width: 300px;
            position: relative;
        }
        .preview-image {
            width: 100%;
            border-radius: 8px;
            display: block;
        }
        .loading-spinner {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255,255,255,0.9);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
        }
        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid var(--primary-blue);
            border-top: 4px solid transparent;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        .drag-over {
            border: 2px dashed var(--primary-blue);
            background-color: rgba(45, 127, 249, 0.1);
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    `;
    document.head.appendChild(style);

    // آپلود با کلیک روی دکمه
    uploadButton.addEventListener('click', () => {
        fileInput.click();
    });

    // اضافه کردن event listener برای کلیک روی متن "انتخاب فایل"
    browseText.addEventListener('click', (e) => {
        e.stopPropagation();
        fileInput.click();
    });

    // آپدیت کردن event listener برای کلیک روی کل باکس
    dropZone.addEventListener('click', () => {
        fileInput.click();
    });

    // آپدیت کردن drag & drop events
    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.classList.add('drag-over');
    });

    dropZone.addEventListener('dragleave', () => {
        dropZone.classList.remove('drag-over');
    });

    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone.classList.remove('drag-over');
        
        const files = e.dataTransfer.files;
        if (files.length > 0 && files[0].type.startsWith('image/')) {
            handleImage(files[0]);
        }
    });

    // آپلود با انتخاب فایل
    fileInput.addEventListener('change', (e) => {
        if (e.target.files.length > 0) {
            handleImage(e.target.files[0]);
        }
    });

    // Paste از کلیپ‌بورد
    document.addEventListener('paste', (e) => {
        const items = e.clipboardData.items;
        for (let item of items) {
            if (item.type.startsWith('image/')) {
                const file = item.getAsFile();
                handleImage(file);
                break;
            }
        }
    });

    // پردازش تصویر
    function handleImage(file) {
        const previewContainer = document.querySelector('.preview-container');
        const previewImage = document.querySelector('.preview-image');
        const loadingSpinner = document.querySelector('.loading-spinner');
        
        // نمایش پیش‌نمایش
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImage.src = e.target.result;
            previewContainer.style.display = 'block';
            loadingSpinner.style.display = 'flex';
            
            // شبیه‌سازی پردازش تصویر
            setTimeout(() => {
                loadingSpinner.style.display = 'none';
                // در اینجا می‌توانید کد مربوط به ارسال تصویر به سرور را اضافه کنید
                console.log('تصویر آپلود شد:', file.name);
            }, 2000);
        };
        reader.readAsDataURL(file);
    }

    // اصلاح کنترل منوی موبایل
    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            mobileMenu.style.display = 'block';
            requestAnimationFrame(() => {
                mobileMenu.classList.add('active');
            });
            document.body.style.overflow = 'hidden';
        });
    }

    if (mobileMenuClose) {
        mobileMenuClose.addEventListener('click', () => {
            mobileMenu.classList.remove('active');
            setTimeout(() => {
                mobileMenu.style.display = 'none';
            }, 300);
            document.body.style.overflow = 'auto';
        });
    }

    // بستن منو با کلیک روی لینک‌ها
    mobileMenuLinks.forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.remove('active');
            setTimeout(() => {
                mobileMenu.style.display = 'none';
            }, 300);
            document.body.style.overflow = 'auto';
        });
    });

    // بستن منو با کلیک خارج از آن
    document.addEventListener('click', (e) => {
        if (mobileMenu.classList.contains('active') && 
            !mobileMenu.contains(e.target) && 
            !mobileMenuBtn.contains(e.target)) {
            mobileMenu.classList.remove('active');
            setTimeout(() => {
                mobileMenu.style.display = 'none';
            }, 300);
            document.body.style.overflow = 'auto';
        }
    });

    // جلوگیری از scroll صفحه هنگام scroll در منو
    mobileMenu.addEventListener('touchmove', (e) => {
        e.stopPropagation();
    }, { passive: false });
}); 
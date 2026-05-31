function showLoader() {
    document.getElementById('loader').classList.remove('d-none')
}
function hideLoader() {
    document.getElementById('loader').classList.add('d-none')
}
function successToast(msg) {
    let toast = document.createElement('div');
    toast.style.position = 'fixed';
    toast.style.top = '20px';
    toast.style.right = '20px'; // right use করছি left এর পরিবর্তে
    toast.style.backgroundColor = 'green';
    toast.style.color = 'white';
    toast.style.borderRadius = '8px';
    toast.style.zIndex = '999999';
    toast.style.boxShadow = '0 4px 12px rgba(0,0,0,0.15)';
    toast.style.animation = 'slideInRight 0.3s ease'; // Right to Left animation
    toast.style.display = 'inline-block';
    toast.style.maxWidth = '500px';
    toast.style.minWidth = 'auto';
    toast.style.width = 'auto';
    
    let wrapper = document.createElement('div');
    wrapper.style.display = 'flex';
    wrapper.style.alignItems = 'center';
    wrapper.style.justifyContent = 'space-between';
    wrapper.style.padding = '12px 16px';
    wrapper.style.gap = '15px';
    wrapper.style.width = '100%';
    
    let messageSpan = document.createElement('span');
    messageSpan.innerHTML = msg;
    messageSpan.style.fontSize = '14px';
    messageSpan.style.fontWeight = '500';
    messageSpan.style.fontFamily = 'system-ui, -apple-system, sans-serif';
    messageSpan.style.lineHeight = '1.5';
    messageSpan.style.wordBreak = 'break-word';
    messageSpan.style.whiteSpace = 'normal';
    messageSpan.style.flex = '1';
    messageSpan.style.maxWidth = '400px'; // ২০ শব্দের জন্য ample space
    
    let closeBtn = document.createElement('span');
    closeBtn.innerHTML = '×';
    closeBtn.style.fontSize = '20px';
    closeBtn.style.fontWeight = 'bold';
    closeBtn.style.cursor = 'pointer';
    closeBtn.style.lineHeight = '1';
    closeBtn.style.padding = '0 5px';
    closeBtn.style.transition = 'all 0.2s';
    closeBtn.style.color = 'white';
    closeBtn.style.opacity = '0.8';
    closeBtn.style.flexShrink = '0';
    
    closeBtn.onmouseenter = () => {
        closeBtn.style.opacity = '1';
        closeBtn.style.transform = 'scale(1.1)';
    };
    closeBtn.onmouseleave = () => {
        closeBtn.style.opacity = '0.8';
        closeBtn.style.transform = 'scale(1)';
    };
    
    closeBtn.onclick = (e) => {
        e.stopPropagation();
        closeToast(toast);
    };
    
    wrapper.appendChild(messageSpan);
    wrapper.appendChild(closeBtn);
    toast.appendChild(wrapper);
    
    document.body.appendChild(toast);
    
    let timeout = setTimeout(() => {
        closeToast(toast);
    }, 3000);
    
    toast.onmouseenter = () => {
        clearTimeout(timeout);
    };
    
    toast.onmouseleave = () => {
        timeout = setTimeout(() => {
            closeToast(toast);
        }, 3000);
    };
}

function errorToast(msg) {
    let toast = document.createElement('div');
    toast.style.position = 'fixed';
    toast.style.top = '20px';
    toast.style.right = '20px';
    toast.style.backgroundColor = '#f5011a';
    toast.style.color = 'white';
    toast.style.borderRadius = '8px';
    toast.style.zIndex = '999999';
    toast.style.boxShadow = '0 4px 12px rgba(0,0,0,0.15)';
    toast.style.animation = 'slideInRight 0.3s ease';
    toast.style.display = 'inline-block';
    toast.style.maxWidth = '500px';
    toast.style.minWidth = 'auto';
    toast.style.width = 'auto';
    
    let wrapper = document.createElement('div');
    wrapper.style.display = 'flex';
    wrapper.style.alignItems = 'center';
    wrapper.style.justifyContent = 'space-between';
    wrapper.style.padding = '12px 16px';
    wrapper.style.gap = '15px';
    wrapper.style.width = '100%';
    
    let messageSpan = document.createElement('span');
    messageSpan.innerHTML = msg;
    messageSpan.style.fontSize = '14px';
    messageSpan.style.fontWeight = '500';
    messageSpan.style.fontFamily = 'system-ui, -apple-system, sans-serif';
    messageSpan.style.lineHeight = '1.5';
    messageSpan.style.wordBreak = 'break-word';
    messageSpan.style.whiteSpace = 'normal';
    messageSpan.style.flex = '1';
    messageSpan.style.maxWidth = '400px';
    
    let closeBtn = document.createElement('span');
    closeBtn.innerHTML = '×';
    closeBtn.style.fontSize = '20px';
    closeBtn.style.fontWeight = 'bold';
    closeBtn.style.cursor = 'pointer';
    closeBtn.style.lineHeight = '1';
    closeBtn.style.padding = '0 5px';
    closeBtn.style.transition = 'all 0.2s';
    closeBtn.style.color = 'white';
    closeBtn.style.opacity = '0.8';
    closeBtn.style.flexShrink = '0';
    
    closeBtn.onmouseenter = () => {
        closeBtn.style.opacity = '1';
        closeBtn.style.transform = 'scale(1.1)';
    };
    closeBtn.onmouseleave = () => {
        closeBtn.style.opacity = '0.8';
        closeBtn.style.transform = 'scale(1)';
    };
    
    closeBtn.onclick = (e) => {
        e.stopPropagation();
        closeToast(toast);
    };
    
    wrapper.appendChild(messageSpan);
    wrapper.appendChild(closeBtn);
    toast.appendChild(wrapper);
    
    document.body.appendChild(toast);
    
    let timeout = setTimeout(() => {
        closeToast(toast);
    }, 3000);
    
    toast.onmouseenter = () => {
        clearTimeout(timeout);
    };
    
    toast.onmouseleave = () => {
        timeout = setTimeout(() => {
            closeToast(toast);
        }, 3000);
    };
}

function closeToast(toast) {
    if (!toast || !toast.remove) return;
    toast.style.animation = 'fadeOutRight 0.3s ease';
    setTimeout(() => {
        if (toast && toast.remove) {
            toast.remove();
        }
    }, 300);
}

// CSS অ্যানিমেশন (Right to Left)
const toastStyles = document.createElement('style');
toastStyles.textContent = `
    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes fadeOutRight {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
`;
document.head.appendChild(toastStyles);
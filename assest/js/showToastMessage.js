function showSuccessToast(){
    toast ( {
      title: "Thanh cong!",
      msg: "chuc mung ban da dang ky tai khoan thanh cong.",
      type: "success",
      duration: 3000,
    });
}

function showErrorToast(){
    toast ( {
      title: "That bai!",
      msg: "co loi xay ra, vui long xem lai thong tin ca nhan.",
      type: "error",
      duration: 3000,
    });
}


function toast({ title = "", msg = "", type = "", duration = "" }) {
    const main = document.getElementById('toast');
    if(main) {
        const toast = document.createElement('div');

        // Auto remove toast
        const autoRemoveID = setTimeout(function() {
            main.removeChild(toast);
        }, duration + 1000)

// Remove toast when click
        toast.onclick = function(e) {
            if (e.target.closest('.toast__close')) {
                main.removeChild(toast);
                clearTimeout(autoRemoveID);
            }
        }

        const icons = {
            success: 'fa-solid fa-circle-check',
            info: 'fa-solid fa-circle-exclamation',
            warning: 'fa-solid fa-triangle-exclamation',
            error: 'fa-solid fa-circle-exclamation'
        };

        const icon = icons[type];
        const delay = (duration / 1000) .toFixed(2);
        toast.classList.add('toast', `toast--${type}`);
        toast.style.animation = `slideInLeft ease 0.5s, fadeOut linear 1s ${delay}s forwards`;
        toast.innerHTML = `
            <div class="toast__icon">
                <i class="${icon}"></i>
            </div>
            <div class="toast__body">
                <h3 class="toast__title">
                    ${title}
                </h3>
                <div class="toast__desc">${msg}</div>
            </div>
            <div class="toast__close">
                <i class="fa-solid fa-xmark"></i>
            </div> `;
            main.appendChild(toast);
    }

}
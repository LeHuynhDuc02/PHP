function openPopup(event) {
    event.preventDefault();
    document.getElementById("myPopup").style.display = "flex"; /* Hiển thị popup */
}

function closePopup() {
    document.getElementById("myPopup").style.display = "none"; /* Ẩn popup */
}

function openUploadFile(event) {
    event.preventDefault();
    document.getElementById("fileUploadPopup").style.display = "flex"; /* Hiển thị popup */
}

function cancelUploadFile(event) {
    event.preventDefault();
    document.getElementById("fileUploadPopup").style.display = "none"; /* Ẩn popup */
}

function submitUploadFile() {
    document.getElementById("fileUploadPopup").style.display = "none"; /* Ẩn popup */
}

function showChart() {
    document.getElementById("chart-wrapper").style.display = "flex"; /* Hiển thị popup */
}

function closeChart() {
    document.getElementById("chart-wrapper").style.display = "none"; /* Hiển thị popup */
}

function changeColor(input) {
    if (input.value.length > 0 && !input.hasAttribute("data-changed")) {
        input.setAttribute("data-changed", "true");
        input.style.backgroundColor = "yellow";
    } else if (input.value.length === 0 && input.hasAttribute("data-changed")) {
        input.removeAttribute("data-changed");
        input.style.backgroundColor = "transparent";
    }
}

let inputs = document.getElementsByClassName('mark');
let numColumns = 6;
// Bắt sự kiện nhấn phím
for (let i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener('keydown', function (event) {
        let currentIndex = Array.from(inputs).indexOf(event.target); // Lấy chỉ số hiện tại của input
        if (event.key === 'Enter') {
            event.preventDefault(); // Ngăn chặn hành vi mặc định của phím Enter
            // let currentIndex = Array.from(inputs).indexOf(event.target); // Lấy chỉ số hiện tại của input
            let nextIndex = currentIndex + 1; // Chỉ số của input phía dưới
            if (nextIndex < inputs.length) {
                inputs[nextIndex].focus(); // Di chuyển trỏ đến input phía dưới
            }
        }

        if (event.shiftKey && event.key === 'Enter') {
            event.preventDefault(); // Ngăn chặn hành vi mặc định của phím Shift + Enter
            let rows = Math.floor(currentIndex / numColumns); // Số hàng chứa input
            let nextIndex = (rows + 1) * numColumns + (currentIndex % numColumns); // Chỉ số của input phía dưới theo chiều dọc
            if (nextIndex < inputs.length) {
                inputs[nextIndex].focus(); // Di chuyển trỏ đến input phía dưới theo chiều dọc
            }
        }

        if (event.key === 'ArrowUp') {
            event.preventDefault(); // Ngăn chặn hành vi mặc định của phím mũi tên lên
            let nextIndex = currentIndex - numColumns; // Chỉ số của input phía trên
            if (nextIndex >= 0) {
                inputs[nextIndex].focus(); // Di chuyển trỏ đến input phía trên
            }
        }

        if (event.key === 'ArrowDown') {
            event.preventDefault(); // Ngăn chặn hành vi mặc định của phím mũi tên xuống
            let nextIndex = currentIndex + numColumns; // Chỉ số của input phía dưới
            if (nextIndex < inputs.length) {
                inputs[nextIndex].focus(); // Di chuyển trỏ đến input phía dưới
            }
        }

        // if (event.key === 'ArrowLeft') {
        //     event.preventDefault(); // Ngăn chặn hành vi mặc định của phím mũi tên trái
        //     let nextIndex = currentIndex - 1; // Chỉ số của input bên trái
        //     if (currentIndex % numColumns !== 0) {
        //         inputs[nextIndex].focus(); // Di chuyển trỏ đến input bên trái
        //     }
        // }
        //
        // if (event.key === 'ArrowRight') {
        //     event.preventDefault(); // Ngăn chặn hành vi mặc định của phím mũi tên phải
        //     let nextIndex = currentIndex + 1; // Chỉ số của input bên phải
        //     if ((currentIndex + 1) % numColumns !== 0) {
        //         inputs[nextIndex].focus(); // Di chuyển trỏ đến input bên phải
        //     }
        // }
    });
}

let inputs2 = document.getElementsByClassName('mark');
for (let i = 0; i < inputs2.length; i++) {
    inputs2[i].addEventListener('focus', function (event) {
        let row = event.target.closest('tr'); // Tìm hàng chứa input được chọn
        row.classList.add('highlight-row'); // Thêm class để thay đổi màu chữ
    });

    inputs2[i].addEventListener('blur', function (event) {
        let row = event.target.closest('tr'); // Tìm hàng chứa input
        row.classList.remove('highlight-row'); // Xóa class để trở về màu chữ mặc định
    });
}


var saveButton = document.getElementById('updateMark');

for (let i = 0; i < inputs2.length; i++) {
    inputs2[i].addEventListener('input', function (event) {
        let value = parseFloat(inputs2[i].value);
        if (value > 10 || value < 0) {
            alert("Điểm từ 0 đến 10");
            inputs2[i].value = "";
        }
        let shouldShowAlert = true;
        inputs2[i].addEventListener('input', function () {
            shouldShowAlert = true;
        });
        saveButton.addEventListener('click', function () {
            shouldShowAlert = false;
        });
        window.onbeforeunload = function () {
            if (inputs2[i].value.length > 0 && shouldShowAlert) {
                return 'Bạn có chắc muốn rời khỏi trang này? Thay đổi của bạn chưa được lưu.';
            }
        };
    });
}


const mainButton = document.getElementById('main-button');
const icon = mainButton.querySelector('i');
const submenu = document.getElementById('sub-menu');

mainButton.addEventListener('mouseover', () => {
    icon.style.transition = 'transform 0.1s ease-in-out';
    icon.style.transform = 'rotate(90deg)';
    icon.classList.replace('fa-bars', 'fa-caret-square-up');
});

mainButton.addEventListener('mouseout', () => {
    icon.style.transition = 'transform 0.1s ease-in-out';
    icon.style.transform = 'rotate(0deg)';
    icon.classList.replace('fa-caret-square-up', 'fa-bars');
});

submenu.addEventListener('mouseover', () => {
    icon.style.transition = 'transform 0.1s ease-in-out';
    icon.style.transform = 'rotate(90deg)';
    icon.classList.replace('fa-bars', 'fa-caret-square-up');
});

submenu.addEventListener('mouseout', () => {
    icon.style.transition = 'transform 0.1s ease-in-out';
    icon.style.transform = 'rotate(0deg)';
    icon.classList.replace('fa-caret-square-up', 'fa-bars');
});


function checkReload() {
    inputs2[i].addEventListener('input', function () {
        window.onbeforeunload = function () {
            if (inputs2[i].value.length > 0) {
                return 'Bạn có chắc muốn rời khỏi trang này? Thay đổi của bạn chưa được lưu.';
            }
        };
    });
}

// let inputs3 = document.getElementsByClassName('final-mark');
// for (let i = 0; i < inputs3.length; i++) {
//     inputs3[i].addEventListener('input', function(event) {
//         let value = parseFloat(inputs3[i].value);
//         // let roundedValue = Math.round(value * 100) / 100; // Làm tròn đến 2 chữ số thập phân
//         // inputs3[i].value = roundedValue.toFixed(2); // Hiển thị giá trị đã làm tròn với 2 chữ số thập phân
//     });
// }

function printPage() {
    let style = document.createElement('style');
    style.innerHTML = '@page { size: landscape; orientation: landscape;}';
    document.head.appendChild(style);
    window.print();
}

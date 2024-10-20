import './bootstrap';
import Alpine from 'alpinejs';
import QrScanner from 'qr-scanner';

Alpine.directive('scanner', (el, { value }, { effect, cleanup }) => {
    let videoElem = el.querySelector('video');
    let outputElem = el.querySelector('.output');
    let qrScanner = null;

    // Function to start scanning
    const startScanning = () => {
        navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } })
            .then((stream) => {
                videoElem.srcObject = stream;

                qrScanner = new QrScanner(videoElem, result => {
                    console.log('QR Code detected:', result);

                    outputElem.textContent = result;  // Display the result
                });

                qrScanner.start();
            })
            .catch((error) => {
                console.error('Camera access denied or error occurred:', error);
                outputElem.textContent = 'Unable to access the camera. Please grant permission.';
            });
    };

    // Start the scanner
    startScanning();

    // Clean up when the directive is destroyed
    cleanup(() => {
        if (qrScanner) {
            qrScanner.stop();
            qrScanner.destroy();
        }
    });
});

Alpine.start();

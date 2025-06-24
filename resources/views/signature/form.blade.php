<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <title>Form Tanda Tangan Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        @media print {
            .no-print {
                display: none !important;
            }

            body {
                font-family: Arial, sans-serif;
                font-size: 12px;
                color: #000;
            }
        }

        canvas {
            border: 1px solid #ccc;
            border-radius: 6px;
            width: 100%;
            max-width: 100%;
        }
    </style>
</head>

<body class="p-4">
    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="col-6">
            <img src="/assets/klinik-insan.png" width="100" alt="Logo" />
        </div>
        <div class="col-6 text-end">
            <p class="fw-bold mb-0">KLINIK PRATAMA RAWAT JALAN INSAN MEDIKA</p>
            <span>Jl. R. Sosro Prawiro No. 1A Wirowongso, Ajung – Jember</span>
        </div>
    </div>
    <hr>
    <h5 class="mb-3 text-center">Formulir Tanda Tangan Digital</h5>

    <form method="POST" action="{{ url('/sign-request/' . $token) }}" onsubmit="return prepareSignature(event);">
        @csrf

        <input type="hidden" name="nama" id="nama" required>
        <input type="hidden" name="ttd_image" id="ttd_image">

        <label for="signature-pad">Tanda Tangan:</label>
        <div class="border p-2 mb-3" style="max-width: 100%; position: relative;">
            <canvas id="signature-pad" width="300" height="650"></canvas>
            <button type="button" class="btn btn-sm btn-secondary mt-2" onclick="clearSignature()">Bersihkan</button>
        </div>

        <div class="text-center mt-5">
            <button type="submit" class="btn btn-primary w-50 py-2 fs-5">Kirim</button>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.5/dist/signature_pad.umd.min.js"></script>
    <script>
        const canvas = document.getElementById('signature-pad');
        const signaturePad = new SignaturePad(canvas);

        function resizeCanvas() {
            const ratio = Math.max(window.devicePixelRatio || 1, 1);
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = canvas.offsetHeight * ratio;
            canvas.getContext('2d').scale(ratio, ratio);
            signaturePad.clear();
        }

        window.addEventListener('resize', resizeCanvas);
        resizeCanvas();

        function clearSignature() {
            signaturePad.clear();
            document.getElementById('ttd_image').value = '';
        }

        function prepareSignature(event) {
            const namaWali = localStorage.getItem('nama_wali');


            if (signaturePad.isEmpty()) {
                alert("Silakan gambar tanda tangan terlebih dahulu.");
                event.preventDefault();
                return false;
            }

            document.getElementById('nama').value = namaWali;
            document.getElementById('ttd_image').value = signaturePad.toDataURL('image/png');

            return true;
        }
    </script>
</body>

</html>
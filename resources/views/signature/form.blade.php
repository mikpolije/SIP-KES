<!-- FORM SIGNATURE (untuk HP) -->
<form method="POST" action="{{ url('/sign-request/' . $token) }}" onsubmit="return prepareSignature(event);">
    @csrf

    <label for="nama">Nama Lengkap:</label>
    <input type="text" name="nama" class="form-control mb-3" required>

    <label for="ttd">Tanda Tangan Digital:</label>
    <div class="border p-2 mb-2" style="position: relative;">
        <canvas id="signature-pad" width="300" height="150" style="border:1px solid #ccc;"></canvas>
        <button type="button" class="btn btn-sm btn-secondary mt-2" onclick="clearSignature()">Bersihkan</button>
    </div>

    <input type="hidden" name="ttd_image" id="ttd_image">

    <button type="submit" class="btn btn-primary">Kirim</button>
</form>

<!-- SCRIPT SIGNATURE PAD -->
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
<script>
    const canvas = document.getElementById('signature-pad');
    const signaturePad = new SignaturePad(canvas);

    function clearSignature() {
        signaturePad.clear();
    }

    function prepareSignature(event) {
        if (signaturePad.isEmpty()) {
            alert("Silakan gambar tanda tangan terlebih dahulu.");
            event.preventDefault(); // cegah form dikirim
            return false;
        }

        const dataURL = signaturePad.toDataURL('image/png');
        document.getElementById('ttd_image').value = dataURL;
        return true; // lanjutkan submit
    }
</script>

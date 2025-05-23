<div class="mb-3" x-data="signaturePad(@entangle($attributes->wire('model')))">
  <label class="form-label fw-semibold">Signature</label>
  <div class="mb-2 w-100" style="position: relative; height: 300px; max-width: 300px;">
    <canvas id="canvas_wrapper" style="position: absolute; width: 100%; height: 100%; left: 0; top: 0" class="border rounded" x-ref="signature_canvas">

    </canvas>
    <button style="position: absolute; bottom: 0; left: 0;" class="btn btn-secondary btn-sm mt-2" id="clear" type="button">Clear</button>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/signature_pad@5.0.7/dist/signature_pad.umd.min.js"></script>

<script>
  document.addEventListener('alpine:init', () => {
    Alpine.data('signaturePad', (value) => ({
      signaturePadInstance: null,
      value: value,
      init() {
        this.signaturePadInstance = new SignaturePad(this.$refs.signature_canvas);

        this.signaturePadInstance.addEventListener("endStroke", () => {
          this.value = this.signaturePadInstance.toDataURL('image/png');
        });

        if (value.initialValue) {
          this.signaturePadInstance.fromDataURL(value.initialValue, {ratio: 1, width: 300, height: 300});
        }

        document.getElementById('clear').addEventListener('click', () => {
          this.signaturePadInstance.clear()
        });

        const resizeCanvas = () => {
          const canvas = document.getElementById('canvas_wrapper')
          const ratio = Math.max(window.devicePixelRatio || 1, 1);

          canvas.width = canvas.offsetWidth * ratio;
          canvas.height = canvas.offsetHeight * ratio;
          canvas.getContext("2d").scale(ratio, ratio);

          this.signaturePadInstance.clear();
        }

        window.onresize = resizeCanvas;
        resizeCanvas();
      },
    }))
  })
</script>

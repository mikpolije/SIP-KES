<script>
    $(document).ready(function(e) {
        // Risiko
        let riwayat_jatuh, diagnosa_sekunder, alat_bantu, terpasang_infuse, gaya_berjalan, status_mental, total;
        let allRowRisiko = ['risiko_riwayat_jatuh', 'risiko_diagnosa_sekunder', 'risiko_alat_bantu', 'risiko_terpasang_infuse', 'risiko_gaya_berjalan', 'risiko_status_mental'];

        $('input[type=radio][name=risiko_riwayat_jatuh]').change(function() {
            riwayat_jatuh = $(this).val()
            $(`.skor_riwayat_jatuh`).html(riwayat_jatuh.toString())
            countTotal()
        });

        $('input[type=radio][name=risiko_diagnosa_sekunder]').change(function() {
            diagnosa_sekunder = $(this).val()
            $(`.skor_diagnosa_sekunder`).html(diagnosa_sekunder.toString())
            countTotal()
        });

        $('input[type=radio][name=risiko_alat_bantu]').change(function() {
            alat_bantu = $(this).val()
            $(`.skor_alat_bantu`).html(alat_bantu.toString())
            countTotal()
        });

        $('input[type=radio][name=risiko_terpasang_infuse]').change(function() {
            terpasang_infuse = $(this).val()
            $(`.skor_terpasang_infuse`).html(terpasang_infuse.toString())
            countTotal()
        });
        
        $('input[type=radio][name=risiko_gaya_berjalan]').change(function() {
            gaya_berjalan = $(this).val()
            $(`.skor_gaya_berjalan`).html(gaya_berjalan.toString())
            countTotal()
        });
        
        $('input[type=radio][name=risiko_status_mental]').change(function() {
            status_mental = $(this).val()
            $(`.skor_status_mental`).html(status_mental.toString())
            countTotal()
        });

        function countTotal () {
            let keterangan
            total = 0
            $.each(allRowRisiko, function(i, val) {
                if($(`input[type=radio][name=${val}]`).is(':checked')) {
                    total += parseInt($(`input[type=radio][name=${val}]:checked`).val())
                }
            })
            
            if (total <= 24) {
                keterangan = 'Risiko Rendah'
            } else if (total > 24 && total <= 50){
                keterangan = 'Risiko Sedang'
            } else if (total > 50) {
                keterangan = 'Risiko Tinggi'
            }

            $("#total-skor").html(total)
            $("#keterangan-skor").html(keterangan)
        }

        // ADL 
        let allRowADL = ['adl_makan', 'adl_berpindah', 'adl_kebersihan_diri', 'adl_aktivitas_di_toilet', 'adl_mandi', 'adl_berjalan_di_datar', 'adl_naik_turun_tangga', 'adl_berpakaian', 'adl_mengontrol_bab', 'adl_mengontrol_bak']

        $('input[type=radio][name=adl_makan]').change(function(e) {
            countTotalADL()
        })
        $('input[type=radio][name=adl_berpindah]').change(function(e) {
            countTotalADL()
        })
        $('input[type=radio][name=adl_kebersihan_diri]').change(function(e) {
            countTotalADL()
        })
        $('input[type=radio][name=adl_aktivitas_di_toilet]').change(function(e) {
            countTotalADL()
        })
        $('input[type=radio][name=adl_mandi]').change(function(e) {
            countTotalADL()
        })
        $('input[type=radio][name=adl_berjalan_di_datar]').change(function(e) {
            countTotalADL()
        })
        $('input[type=radio][name=adl_naik_turun_tangga]').change(function(e) {
            countTotalADL()
        })
        $('input[type=radio][name=adl_berpakaian]').change(function(e) {
            countTotalADL()
        })
        $('input[type=radio][name=adl_mengontrol_bab]').change(function(e) {
            countTotalADL()
        })
        $('input[type=radio][name=adl_mengontrol_bak]').change(function(e) {
            countTotalADL()
        })

        function countTotalADL () {
            let totalADL = 0
            $.each(allRowADL, function(i, val) {
                if($(`input[type=radio][name=${val}]`).is(':checked')) {
                    totalADL += parseInt($(`input[type=radio][name=${val}]:checked`).val())
                }
            })

            $('#totalADL').html(totalADL)
        }
    })
</script>
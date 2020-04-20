$(document).ready(function () {
    $('#pendaftaranSiswa-form').on('change', '#jenjang_asal_sekolah', function () {
        let id_jenjang_sekolah = $(this).val()
        $.ajax({
            type: "POST",
            url: "getTingkatKelasByIdJenjangSekolah/" + id_jenjang_sekolah,
            success: function (data) {
                let value = JSON.parse(data)
                $('#tingkat_kelas_siswa').empty()
                $('#kelas_pararel_siswa').empty()
                value.forEach(element => {
                    $('#tingkat_kelas_siswa').append($("<option></option>")
                        .attr("value", element.id_tingkat_kelas)
                        .text(element.nama_tingkat_kelas));
                });
            }
        })

        $.ajax({
            type: "POST",
            url: "getJenisAsalSekolahByIdJenjangSekolah/" + id_jenjang_sekolah,
            success: function (data) {
                let value = JSON.parse(data)
                $('#jenis_asal_sekolah').empty()
                value.forEach(element => {
                    $('#jenis_asal_sekolah').append($("<option></option>")
                        .attr("value", element.id_asal_sekolah)
                        .text(element.nama_asal_sekolah));
                });
            }
        })
    })

    $('#pendaftaranSiswa-form').on('change', '#tingkat_kelas_siswa', function () {
        let id_tingkat_kelas = $(this).val()
        $.ajax({
            type: "POST",
            url: "getKelasPararelByIdTingkatKelas/" + id_tingkat_kelas,
            success: function (data) {
                let value = JSON.parse(data)
                $('#kelas_pararel_siswa').empty()
                value.forEach(element => {
                    let kelas_pararel = element.nama_kelas_pararel
                    if (kelas_pararel == '01') {
                        kelas_pararel = 'A'
                    } else if (kelas_pararel == '02') {
                        kelas_pararel = 'B'
                    } else if (kelas_pararel == '03') {
                        kelas_pararel = 'C'
                    } else if (kelas_pararel == '04') {
                        kelas_pararel = 'D'
                    }


                    $('#kelas_pararel_siswa').append($("<option></option>")
                        .attr("value", element.id_kelas_pararel)
                        .text(kelas_pararel));
                });
            }
        })
    })

});
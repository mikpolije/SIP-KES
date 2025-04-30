### SIPKES
<hr>
Run Migration:

1. ```php artisan migrate --path=database/migrations/2025_04_14_215000_add_column_id_pendaftaran_to_poli_kia_table.php```
2. ```php artisan migrate --path=database/migrations/2025_04_16_110403_create_rincian_obat_table.php```
3. ```php artisan migrate --path=database/migrations/2025_04_18_021011_add_column_id_detail_pembelian_obat_on_detail_pembelian_obat_table.php```
4. ```php artisan migrate --path=database/migrations/2025_04_21_103028_update_transaksi_p_kehamilan_table.php```
5. ```php artisan migrate --path=database/migrations/2025_04_21_124832_update_transaksi_program_kb_table.php```
6. ```php artisan migrate --path=database/migrations/2025_04_21_234601_update_transaksi_p_anak_table.php```
7. ```php artisan migrate --path=database/migrations/2025_04_28_025341_update_transaksi_persalinan_table.php```
8. ```php artisan migrate --path=database/migrations/2025_04_28_025605_add_id_transaksi_persalinan_to_riwayat_soap_table.php```
9. ```php artisan migrate --path=database/migrations/2025_04_28_214200_add_pengambilan_obat_table.php```
9. ```php artisan migrate --path=database/migrations/2025_04_30_081757_create_persuratan_poli_kia_table.php```

### TOLONG JANGAN COMMIT .ENV KE REPO INI
<hr>
but please ignore, remove, add to .gitignore, or something. or else do this:

```git update-index --assume-unchanged .env```

<b>NEVER</b> push .env ke repo.


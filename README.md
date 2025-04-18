### SIPKES
<hr>
Run Migration:

1. ```php artisan migrate --path=database/migrations/2025_04_14_215000_add_column_id_pendaftaran_to_poli_kia_table.php```
2. ```php artisan migrate --path=database/migrations/2025_04_16_110403_create_rincian_obat_table.php```
3. ```php artisan migrate --path=database/migrations/2025_04_18_021011_add_column_id_detail_pembelian_obat_on_detail_pembelian_obat_table.php```

### TOLONG JANGAN COMMIT .ENV KE REPO INI
<hr>
but please ignore, remove, add to .gitignore, or something. or else do this:

```git update-index --assume-unchanged .env```

<b>NEVER</b> push .env ke repo.


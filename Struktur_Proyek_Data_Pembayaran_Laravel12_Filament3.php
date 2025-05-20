<?php

// Struktur Laravel 12 + Filament v3 untuk Tema Data Pembayaran

// 1. Migration untuk tabel data pembayaran
// File: database/migrations/xxxx_xx_xx_create_pembayarans_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengirim');
            $table->decimal('jumlah', 12, 2);
            $table->string('metode');
            $table->timestamp('tanggal_pembayaran');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};

// 2. Model Pembayaran
// File: app/Models/Pembayaran.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = [
        'nama_pengirim', 'jumlah', 'metode', 'tanggal_pembayaran'
    ];
}

// 3. Filament Resource
// Command: php artisan make:filament-resource Pembayaran

// File: app/Filament/Resources/PembayaranResource.php
namespace App\Filament\Resources;

use App\Filament\Resources\PembayaranResource\Pages;
use App\Models\Pembayaran;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;

class PembayaranResource extends Resource
{
    protected static ?string $model = Pembayaran::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_pengirim')->required(),
                Forms\Components\TextInput::make('jumlah')->numeric()->required(),
                Forms\Components\Select::make('metode')
                    ->options([
                        'Transfer' => 'Transfer',
                        'Cash' => 'Cash',
                        'QRIS' => 'QRIS',
                    ])
                    ->required(),
                Forms\Components\DateTimePicker::make('tanggal_pembayaran')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_pengirim'),
                Tables\Columns\TextColumn::make('jumlah')->money('IDR'),
                Tables\Columns\TextColumn::make('metode'),
                Tables\Columns\TextColumn::make('tanggal_pembayaran')->dateTime(),
            ])
            ->filters([
                // Tambahkan filter jika perlu
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPembayarans::route('/'),
            'create' => Pages\CreatePembayaran::route('/create'),
            'edit' => Pages\EditPembayaran::route('/{record}/edit'),
        ];
    }
}

// 4. Konfigurasi tambahan keamanan Laravel

// File: config/session.php
// - Atur lifetime session, secure => true jika menggunakan HTTPS
// File: .env
// - APP_ENV=production
// - APP_DEBUG=false
// Middleware tambahan seperti spatie/laravel-csp atau Laravel Sanctum dapat digunakan untuk menambah lapisan keamanan

// Untuk autentikasi disarankan menggunakan Laravel Breeze: 
// php artisan breeze:install
// npm install && npm run dev
// php artisan migrate

// Setelah selesai, push project ke GitHub dan sertakan file essay dalam format PDF.
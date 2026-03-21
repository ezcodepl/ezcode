Przygotowałem kompletną implementację tego panelu dostosowaną do frameworka Laravel. W świecie Laravela najczęściej używa się do tego celu silnika szablonów Blade w połączeniu z Tailwind CSS.

Poniżej znajdziesz strukturę pliku widoku, który możesz umieścić w swoim projekcie (np. resources/views/admin/posts/create.blade.php). Kod zawiera:

Strukturę HTML/Blade z formularzem.

Konfigurację TinyMCE z ciemnym motywem i obsługą galerii.

Logikę JavaScript do obsługi podglądu karty (Live Preview) oraz wgrywania zdjęć.

Panel Admina Laravel ezCode
21 mar, 11:11
Jak to wdrożyć w Laravelu:
Widok: Zapisz powyższy plik jako resources/views/admin/posts/create.blade.php.

Kontroler: W swoim PostController przygotuj metodę store, która obsłuży dane:

PHP
public function store(Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'excerpt' => 'nullable',
        'content' => 'required',
        'category' => 'required',
        'read_time' => 'required',
        'thumbnail' => 'image|mimes:jpeg,png,jpg,webp|max:2048'
    ]);

    if ($request->hasFile('thumbnail')) {
        $data['thumbnail'] = $request->file('thumbnail')->store('posts', 'public');
    }

    Post::create($data);

    return redirect()->back()->with('success', 'Post dodany!');
}
3.  **Trasy (Routes)**: Dodaj odpowiednią trasę w `routes/web.php`:
```php
Route::post('/admin/posts', [PostController::class, 'store'])->name('posts.store');

Co zyskałeś w tej wersji:
Wsparcie dla Blade: Formularz zawiera @csrf, poprawne nazwy pól (name="") i dynamiczną datę.

Brak zależności NPM: Wszystkie biblioteki (Tailwind, Lucide, TinyMCE) są ładowane przez CDN, więc kod zadziała od razu bez kompilacji vite czy mix.

Podgląd Karty: Działa identycznie jak w wersji React – po wpisaniu tytułu lub wybraniu pliku miniatura od razu pojawia się w "Live Preview".

TinyMCE: Skonfigurowany pod ciemny motyw Laravela z możliwością dodawania obrazków i galerii.

Daj znać, jeśli potrzebujesz pomocy przy migracji bazy danych dla tych pól!

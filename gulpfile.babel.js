/*
 * gulpfile.js
 * ===========
 * Zamiast zarządzać jednym wielkim plikiem konfiguracyjnym, odpowiedzialnym
 * za tworzenie wielu zadań gulp (tasks), każdy z nich został wyłaczony
 * do osobnego pliku w folderze '/gulp/tasks/'.
 * Każdy plik znajdujący się w folderze '/gulp/tasks/' zostanie automatycznie
 * dołaczony przez instrukcję required w pętli znajdującej się w pliku
 * '/gulp/index.js' (dołączony poniżej).
 *
 * Aby dodać nowe zadanie gulp, po prostu stwórz nowy plik z zadaniem,
 * w folderze '/gulp/tasks/'. Nie modyfikujemy tego pliku!
 */

global.isProd = false;

require('./gulp');
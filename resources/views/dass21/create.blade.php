@extends('layouts.test')

@section('test-description')
    DASS-21 merupakan instrumen yang digunakan sebagai screening gejala-gejala depresi, kecemasan, dan distress yang berlangsung dalam 1 minggu terakhir. Instrumen ini merupakan versi ringkas dari DASS-42 (α = 0.91) yang dikembangkan oleh Lovibond tahun 1995. Depression Anxiety Stress Scale (DASS) adalah instrumen self-report dengan 21 butir pertanyaan untuk mengukur gejala depresi (α = 0.81), gejala kecemasan (α = 0.80), dan gejala stress (α = 0.88). Responden diminta untuk mengisi daftar pertanyaan yang terdapat di DASS-21 untuk kemudian dibandingkan dengan norma yang ada, sehingga dapat diketahui kategorisasi problem kesehatan mental responden.

    <br>
    <br>
    Silakan jawab pertanyaan berikut dengan jujur. Pilih salah satu jawaban yang paling mendekati
    kondisi anda dalam beberapa minggu terakhir. Jawaban anda akan membantu kami dalam menilai kondisi kesehatan.
    Jawaban anda bersifat rahasia dan tidak akan disebarkan ke pihak manapun.
@endsection

@section('test-form')
<form action="{{ route('test-dass21.submit') }}" class="text-grey" method="POST">
        @csrf
        <ol>
            @foreach ($questions as $question)
                <li class="mb-4">
                    <p class="mb-2">{{ $question->question }}</p>
                    <div class="form-check">
                        <input class="form-check-input @error('q'.$loop->iteration) is-invalid @enderror" type="radio" name="q{{ $loop->iteration }}"
                            id="{{ 'q' . $loop->iteration . 'pil1' }}" value="0" @checked(old('q'.$loop->iteration) == "0")>
                        <label class="form-check-label" for="{{ 'q' . $loop->iteration . 'pil1' }}">
                            Tidak Pernah
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input @error('q'.$loop->iteration) is-invalid @enderror" type="radio" name="q{{ $loop->iteration }}"
                            id="{{ 'q' . $loop->iteration . 'pil2' }}" value="1" @checked(old('q'.$loop->iteration) == "1")>
                        <label class="form-check-label" for="{{ 'q' . $loop->iteration . 'pil2' }}">
                            Kadang-kadang
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input @error('q'.$loop->iteration) is-invalid @enderror" type="radio" name="q{{ $loop->iteration }}"
                            id="{{ 'q' . $loop->iteration . 'pil3' }}" value="2" @checked(old('q'.$loop->iteration) == "2")>
                        <label class="form-check-label" for="{{ 'q' . $loop->iteration . 'pil3' }}">
                            Sering
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input @error('q'.$loop->iteration) is-invalid @enderror" type="radio" name="q{{ $loop->iteration }}"
                            id="{{ 'q' . $loop->iteration . 'pil4' }}" value="3" @checked(old('q'.$loop->iteration) == "3")>
                        <label class="form-check-label" for="{{ 'q' . $loop->iteration . 'pil4' }}">
                            Hampir Selalu
                        </label>
                    </div>
                    @error("q$loop->iteration")
                        <div class="invalid-feedback d-block">Mohon jawab pertanyaan ini.</div>
                    @enderror
                </li>
            @endforeach
        </ol>
        <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary mt-3">Submit</button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Kumpulkan Tes?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Anda yakin ingin mengumpulkan tes ini? Anda tidak bisa mengubah jawaban setelah mengumpulkan tes. 
                        <br>
                        <br>
                        Pastikan anda sudah menjawab semua pertanyaan, dan jawaban anda sudah benar.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-primary">Ya</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
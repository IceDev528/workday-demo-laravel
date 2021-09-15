@extends('layouts.personal')

@section('meta')
    <title>Settings | Workday Time Clock</title>
    <meta name="description" content="Workday settings">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("General Settings") }}
            </h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
           
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" href="#about" role="tab" aria-controls="about" aria-selected="true">{{ __("About") }}</a>
              </li>

              <li class="nav-item" role="presentation">
                <a class="nav-link" id="attributions-tab" data-bs-toggle="tab" data-bs-target="#attributions" href="#attributions" role="tab" aria-controls="attributions" aria-selected="false">{{ __("Attributions") }}</a>
              </li>
            </ul>

            <div class="tab-content p-3" id="myTabContent">

                <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                    <h2>Workday a time clock application for employees</h2>
                    <p>Easily track and manage employee work hours on jobs, improve your payroll process and collaborate with your timekeeping employees like never before.</p>

                    <p class="lead mb-0">Features</p>
                    <ul>
                        <li>Employee Management (HRIS)</li>
                        <li>Time and Attendance Management</li>
                        <li>Employee Time Tracking</li>
                        <li>Shift Management</li>
                        <li>Leave Management</li>
                        <li>Reporting and Analytics</li>
                        <li>Multi-company</li>
                        <li>Manager and Employee self-service</li>
                    </ul>

                    <div class="mt-4">
                        <p class="text-muted mb-0">{{ __("Version") }} 3.0</p>
                        <p class="text-muted">{{ __("Copyright") }} (c) @php echo date('Y') @endphp Codefactor. {{ __("All rights reserved") }}.</p>
                    </div>
                </div>
                <div class="tab-pane fade" id="attributions" role="tabpanel" aria-labelledby="attributions-tab">
                    <h6 class="mb-0">{{ __("Legal Notice") }}</h6>
                    <p>{{ __("Copyright") }} (c) @php echo date('Y') @endphp Brian Luna. {{ __("All rights reserved") }}.</p>
                    
                    <p class="fw-bolder mb-0">Laravel</p>
                    <p class="text-muted">The MIT License (MIT)</p>
                    <p class="ps-3 col-md-6 text-muted">
                        Copyright (c) Taylor Otwell
                        <br><br>
                        Permission is hereby granted, free of charge, to any person obtaining a copy
                        of this software and associated documentation files (the "Software"), to deal
                        in the Software without restriction, including without limitation the rights
                        to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
                        copies of the Software, and to permit persons to whom the Software is
                        furnished to do so, subject to the following conditions:
                        <br><br>
                        The above copyright notice and this permission notice shall be included in
                        all copies or substantial portions of the Software.
                        <br><br>
                        THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
                        IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
                        FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
                        AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
                        LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
                        OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
                        THE SOFTWARE.
                    </p>

                    <p class="fw-bolder mb-0">Bootstrap</p>
                    <p class="text-muted">The MIT License (MIT)</p>
                    <p class="ps-3 col-md-6 text-muted">
                        Copyright 2011-2020 Twitter, Inc.
                        <br><br>
                        Permission is hereby granted, free of charge, to any person obtaining a copy
                        of this software and associated documentation files (the "Software"), to deal
                        in the Software without restriction, including without limitation the rights
                        to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
                        copies of the Software, and to permit persons to whom the Software is
                        furnished to do so, subject to the following conditions:
                        <br><br>
                        The above copyright notice and this permission notice shall be included in
                        all copies or substantial portions of the Software.
                        <br><br>
                        THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
                        IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
                        FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
                        AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
                        LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
                        OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
                        THE SOFTWARE.
                    </p>

                    <p class="fw-bolder mb-0">jQuery JavaScript Library</p>
                    <p class="text-muted">The MIT License (MIT)</p>
                    <p class="ps-3 col-md-6 text-muted">
                        Copyright jQuery Foundation and other contributors
                        <br><br>
                        Permission is hereby granted, free of charge, to any person obtaining a copy
                        of this software and associated documentation files (the "Software"), to deal
                        in the Software without restriction, including without limitation the rights
                        to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
                        copies of the Software, and to permit persons to whom the Software is
                        furnished to do so, subject to the following conditions:
                        <br><br>
                        The above copyright notice and this permission notice shall be included in
                        all copies or substantial portions of the Software.
                        <br><br>
                        THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
                        IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
                        FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
                        AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
                        LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
                        OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
                        THE SOFTWARE.
                    </p>

                    <p class="fw-bolder mb-0">DataTables</p>
                    <p class="text-muted">The MIT License (MIT)</p>
                    <p class="ps-3 col-md-6 text-muted">
                        Copyright 2008-2020 SpryMedia Ltd
                        <br><br>
                        Permission is hereby granted, free of charge, to any person obtaining a copy
                        of this software and associated documentation files (the "Software"), to deal
                        in the Software without restriction, including without limitation the rights
                        to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
                        copies of the Software, and to permit persons to whom the Software is
                        furnished to do so, subject to the following conditions:
                        <br><br>
                        The above copyright notice and this permission notice shall be included in
                        all copies or substantial portions of the Software.
                        <br><br>
                        THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
                        IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
                        FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
                        AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
                        LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
                        OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
                        THE SOFTWARE.
                    </p>

                    <p class="fw-bolder mb-0">Chart.js</p>
                    <p class="text-muted">The MIT License (MIT)</p>
                    <p class="ps-3 col-md-6 text-muted">
                        Copyright 2018 Chart.js Contributors
                        <br><br>
                        Permission is hereby granted, free of charge, to any person obtaining a copy
                        of this software and associated documentation files (the "Software"), to deal
                        in the Software without restriction, including without limitation the rights
                        to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
                        copies of the Software, and to permit persons to whom the Software is
                        furnished to do so, subject to the following conditions:
                        <br><br>
                        The above copyright notice and this permission notice shall be included in
                        all copies or substantial portions of the Software.
                        <br><br>
                        THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
                        IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
                        FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
                        AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
                        LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
                        OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
                        THE SOFTWARE.
                    </p>

                    <p class="fw-bolder mb-0">Moment.js</p>
                    <p class="text-muted">The MIT License (MIT)</p>
                    <p class="ps-3 col-md-6 text-muted">
                        Copyright (c) JS Foundation and other contributors
                        <br><br>
                        Permission is hereby granted, free of charge, to any person obtaining a copy
                        of this software and associated documentation files (the "Software"), to deal
                        in the Software without restriction, including without limitation the rights
                        to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
                        copies of the Software, and to permit persons to whom the Software is
                        furnished to do so, subject to the following conditions:
                        <br><br>
                        The above copyright notice and this permission notice shall be included in
                        all copies or substantial portions of the Software.
                        <br><br>
                        THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
                        IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
                        FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
                        AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
                        LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
                        OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
                        THE SOFTWARE.
                    </p>
                        
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@extends('layout.app')
@section('content')

	@component('layout/hero') @endcomponent

	<div class="container">
		<div class="columns">
			<div class="column is-half is-offset-one-quarter">
				@component('layout/panel')
					<p>Registreer</p>

					@slot('body')
						<form method="POST" class="form-horizontal" role="form">
							{{ csrf_field() }}

							<div class="field">
								<label for="name" class="label">
									Voornaam
								</label>

								<p class="control {{ $errors->has('name') ? ' has-icons-right' : '' }}">
									<input type="text"
									       class="input {{ $errors->has('name') ? ' is-danger' : '' }}"
									       id="name"
									       name="name"
									       value="{{ old('name') }}"
									       required
									       autofocus>

									@if ($errors->has('name'))
										<span class="icon is-small is-right">
									        <i class="fa fa-warning"></i>
									    </span>
									@endif
								</p>

								@if ($errors->has('name'))
									<p class="help is-danger">{{ $errors->first('name') }}</p>
								@endif
							</div>

							<div class="field">
								<label for="name" class="label">
									Achternaam
								</label>

								<p class="control {{ $errors->has('last_name') ? ' has-icons-right' : '' }}">
									<input type="text"
									       class="input {{ $errors->has('last_name') ? ' is-danger' : '' }}"
									       id="last_name"
									       name="last_name"
									       value="{{ old('last_name') }}"
									       required>

									@if ($errors->has('last_name'))
										<span class="icon is-small is-right">
									        <i class="fa fa-warning"></i>
									    </span>
									@endif
								</p>

								@if ($errors->has('last_name'))
									<p class="help is-danger">{{ $errors->first('last_name') }}</p>
								@endif
							</div>

							<div class="field">
								<label for="email" class="label">
									Email
								</label>

								<p class="control {{ $errors->has('email') ? ' has-icons-right' : '' }}">
									<input type="email"
									       class="input {{ $errors->has('email') ? ' is-danger' : '' }}"
									       id="email"
									       name="email"
									       value="{{ old('email') }}"
									       required>

									@if ($errors->has('email'))
										<span class="icon is-small is-right">
									        <i class="fa fa-warning"></i>
									    </span>
									@endif
								</p>

								@if ($errors->has('email'))
									<p class="help is-danger">{{ $errors->first('email') }}</p>
								@endif
							</div>

							<div class="field">
								<label for="name" class="label">
									Functie
								</label>

								<p class="control {{ $errors->has('function') ? ' has-icons-right' : '' }}">
									<input type="text"
									       class="input {{ $errors->has('function') ? ' is-danger' : '' }}"
									       id="function"
									       name="function"
									       value="{{ old('function') }}"
									       required>

									@if ($errors->has('function'))
										<span class="icon is-small is-right">
									        <i class="fa fa-warning"></i>
									    </span>
									@endif
								</p>

								@if ($errors->has('function'))
									<p class="help is-danger">{{ $errors->first('function') }}</p>
								@endif
							</div>


							<div class="field">
								<label for="password" class="label">
									Wachtwoord
								</label>

								<p class="control {{ $errors->has('password') ? ' has-icons-right' : '' }}">
									<input type="password"
									       class="input {{ $errors->has('password') ? ' is-danger' : '' }}"
									       id="password"
									       name="password"
									       required>

									@if ($errors->has('password'))
										<span class="icon is-small is-right">
									        <i class="fa fa-warning"></i>
									    </span>
									@endif
								</p>

								@if ($errors->has('password'))
									<p class="help is-danger">{{ $errors->first('password') }}</p>
								@endif
							</div>

							<div class="field">
								<label for="password_confirmation" class="label">
									Bevestig wachtwoord
								</label>

								<p class="control {{ $errors->has('password_confirmation') ? ' has-icons-right' : '' }}">
									<input type="password"
									       class="input {{ $errors->has('password_confirmation') ? ' is-danger' : '' }}"
									       id="password_confirmation"
									       name="password_confirmation"
									       required>

									@if ($errors->has('password_confirmation'))
										<span class="icon is-small is-right">
									        <i class="fa fa-warning"></i>
									    </span>
									@endif
								</p>

								@if ($errors->has('password'))
									<p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
								@endif
							</div>

							<div class="field is-grouped is-centered">
								<div class="control">
									<button id="submit" class="button is-primary">
										Registreer
									</button>
								</div>

								<div class="control">
									<a href="{{ route('dashboard') }}">Login</a>
								</div>
							</div>
						</form>
					@endslot
				@endcomponent
			</div>
		</div>
	</div>
@endsection
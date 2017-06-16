<aside class="menu">
	<p class="menu-label">Algemeen</p>

	<ul class="menu-list">
		<li>
			<a href="{{ route('settings.profile') }}" class="{{ setActive('instellingen/profiel') }}">
				Profiel
			</a>
		</li>

		<li>
			<a href="{{ route('settings.location') }}" class="{{ setActive('instellingen/locatie') }}">
				Locatie
			</a>
		</li>

		<li>
			<a href="{{ route('settings.administration') }}" class="{{ setActive('instellingen/administratie') }}">
				Kvk/Btw
			</a>
		</li>

	</ul>

	<p class="menu-label">Gebruik</p>

	<ul class="menu-list">
		<li>
			<a href="{{ route('settings.usage') }}" class="{{ setActive('instellingen/gebruik') }}">
				Pakket
			</a>
		</li>
	</ul>
</aside>
### Program setup using Laravel Sail
<ol>
  <li>Clone program from GitHub</li>
<code>git clone git@github.com:Pofkinis/time-tracker.git</code>
  <li>Create .env file</li>
<code>cp .env.example .env</code>
  <li>Install packages</li>
<code>composer update</code>
  <li>Add 'sail' command alias</li>
<code>alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'</code>
    <li>Start Sail</li>
<code>sail up -d</code>
  <li>Generate APP_KEY</li>
<code>sail artisan key:generate</code>
    <li>Create a database with a name "time_tracker". (All connection information to DB provided in .env.example file)</li>
    <li>Run migration command</li>
    <code>sail artisan migrate</code>
    <li>Build front-end</li>
<code>sail npm install</code>
<code>sail npm run build</code>
</ol>

#### Your program setup is finished. Now you can open your browser and reach it via http://127.0.0.1:8080

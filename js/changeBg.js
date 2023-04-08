var background, tableData;

background = document.getElementById("forecastDiv");
tableData = document.getElementById("tableWeather").innerText;

function changeBackground() {
    // if (tableData == "Moderate or heavy snow showers") {
    //     background.style.backgroundImage = "url('images/snowing.jpg')";
    // }

    switch (tableData) {

        case "Sunny":
            background.style.backgroundImage = "url(images/sunny.jpg)";
            break;

        case "Partly cloudy":
            background.style.backgroundImage = "url(images/cloudy.jpg)";
            break;

        case "Cloudy":
            background.style.backgroundImage = "url(images/cloudy.jpg)";
            break;

        case "Overcast":
            background.style.backgroundImage = "url(images/cloudy.jpg)";
            break;

        case "Mist":
            background.style.backgroundImage = "url(images/fog.jpg)";
            break;

        case "Patchy rain possible":
            background.style.backgroundImage = "url(images/rain.jpg)";
            break;

        case "Patchy snow possible":
            background.style.backgroundImage = "url(images/snowing.jpg)";
            break;

        case "Patchy sleet possible":
            background.style.backgroundImage = "url(images/sleet.jpg)";
            break;

        case "Patchy freezing drizzle possible":
            background.style.backgroundImage = "url(images/drizzle.jpg)";
            break;

        case "Thundery outbreaks possible":
            background.style.backgroundImage = "url(images/thunder.jpg)";
            break;

        case "Blowing snow":
            background.style.backgroundImage = "url(images/snowing.jpg)";
            break;

        case "Blizzard":
            background.style.backgroundImage = "url(images/snowing.jpg)";
            break;

        case "Fog":
            background.style.backgroundImage = "url(images/fog.jpg)";
            break;

        case "Freezing fog":
            background.style.backgroundImage = "url(images/fog.jpg)";
            break;

        case "Patchy light drizzle":
            background.style.backgroundImage = "url(images/drizzle.jpg)";
            break;

        case "Light drizzle":
            background.style.backgroundImage = "url(images/drizzle.jpg)";
            break;

        case "Freezing drizzle":
            background.style.backgroundImage = "url(images/drizzle.jpg)";
            break;

        case "Heavy freezing drizzle":
            background.style.backgroundImage = "url(images/drizzle.jpg)";
            break;

        case "Patchy light rain":
            background.style.backgroundImage = "url(images/rain.jpg)";
            break;

        case "Light rain":
            background.style.backgroundImage = "url(images/rain.jpg)";
            break;

        case "Moderate rain at times":
            background.style.backgroundImage = "url(images/rain.jpg)";
            break;

        case "Moderate rain":
            background.style.backgroundImage = "url(images/rain.jpg)";
            break;

        case "Heavy rain at times":
            background.style.backgroundImage = "url(images/rain.jpg)";
            break;

        case "Heavy rain":
            background.style.backgroundImage = "url(images/rain.jpg)";
            break;

        case "Light freezing rain":
            background.style.backgroundImage = "url(images/rain.jpg)";
            break;

        case "Moderate or heavy freezing rain":
            background.style.backgroundImage = "url(images/rain.jpg)";
            break;

        case "Light sleet":
            background.style.backgroundImage = "url(images/sleet.jpg)";
            break;

        case "Moderate or heavy sleet":
            background.style.backgroundImage = "url(images/sleet.jpg)";
            break;

        case "Patchy light snow":
            background.style.backgroundImage = "url(images/snowing.jpg)";
            break;

        case "Light snow":
            background.style.backgroundImage = "url(images/snowing.jpg)";
            break;

        case "Patchy moderate snow":
            background.style.backgroundImage = "url(images/snowing.jpg)";
            break;

        case "Moderate snow":
            background.style.backgroundImage = "url(images/snowing.jpg)";
            break;

        case "Patchy heavy snow":
            background.style.backgroundImage = "url(images/snowing.jpg)";
            break;

        case "Heavy snow":
            background.style.backgroundImage = "url(images/snowing.jpg)";
            break;

        case "Ice pellets":
            background.style.backgroundImage = "url(images/snowing.jpg)";
            break;

        case "Light rain shower":
            background.style.backgroundImage = "url(images/rain.jpg)";
            break;

        case "Moderate or heavy rain shower":
            background.style.backgroundImage = "url(images/rain.jpg)";
            break;

        case "Torrential rain shower":
            background.style.backgroundImage = "url(images/rain.jpg)";
            break;

        case "Light sleet showers":
            background.style.backgroundImage = "url(images/sleet.jpg)";
            break;

        case "Moderate or heavy sleet showers":
            background.style.backgroundImage = "url(images/sleet.jpg)";
            break;

        case "Light snow showers":
            background.style.backgroundImage = "url(images/snowing.jpg)";
            break;

        case "Moderate or heavy snow showers":
            background.style.backgroundImage = "url(images/snowing.jpg)";
            break;

        case "Light showers of ice pellets":
            background.style.backgroundImage = "url(images/snowing.jpg)";
            break;

        case "Moderate or heavy showers of ice pellets":
            background.style.backgroundImage = "url(images/snowing.jpg)";
            break;

        case "Patchy light rain with thunder":
            background.style.backgroundImage = "url(images/thunder.jpg)";
            break;

        case "Moderate or heavy rain with thunder":
            background.style.backgroundImage = "url(images/thunder.jpg)";
            break;

        case "Patchy light snow with thunder":
            background.style.backgroundImage = "url(images/snowing.jpg)";
            break;

        case "Moderate or heavy snow with thunder":
            background.style.backgroundImage = "url(images/snowing.jpg)";
    }
}

changeBackground();
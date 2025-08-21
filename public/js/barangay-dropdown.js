const barangayData = {
    "Brgy. Aplaya": [
        "None",
        "Dictado Subd",
        "St. Rose Village I",
        "Terrytown Subd",
        "Rosario Heights Subd",
    ],
    "Brgy. Balibago": [
        "None",
        "Metroville Subd",
        "St. Francis Homes XIV",
        "J.B. Village II",
        "J.B. Village",
        "Amar Village",
        "Maria Jesusa Subd",
        "NueNueva Balibago",
        "South Hampton",
    ],
    "Brgy. Caingin": ["None"],
    "Brgy. Dila": [
        "None",
        "Southdrive Subd",
        "Flamingo St. Southdrive Subd",
        "Golden City Subd",
        "Maja Village",
        "Mabuhay Homes",
        "VillaCaceres",
        "Villa de Toledo",
        "La Joya de Sta. Rosa",
        "Merryland Subd",
    ],
    "Brgy. Dita": [
        "None",
        "Anahaw Homes",
        "Solcar Ville",
        "St. Agatha II Subd",
        "St. Agatha Village",
        "New Santa Rosa Homes",
        "Panorama Subd",
        "Mariquita Pueblo I-II Subd",
        "Meryland Subd",
        "Roseville Subd",
        "San Lorenzo South Subd",
        "Santa Rosa Homes",
        "St. Agata Village",
        "Villa Antharium",
    ],
    "Brgy. Ibaba": [
        "None",
        "De Lima Subd",
        "Saint John Subd",
        "Ambrocia Subd",
        "De Lima II Subd",
        "Saint Rosa De Lima Subd",
    ],
    "Brgy. Labas": [
        "None",
        "East Drive Subd",
        "Olympia Park Subd",
        "St. Agata Village I",
        "West Drive Village",
        "Villa Laserna",
    ],
    "Brgy. Macabling": [
        "None",
        "Lakeshore Subd",
        "Rosa Subd",
        "San Isidro Ville",
        "Zeramyr Subd",
        "Love Home Subd",
        "Rosemont Ville",
        "Villa Antonia",
        "Buena Rosa 9",
    ],
    "Brgy. Malitlit": [
        "None",
        "San Lorenzo South Subd",
        "Villa Las Casas",
        "Terra Fortuna II",
        "St Agata Homes Subd",
        "Villa Susana Subd",
    ],
    "Brgy. Market Area": [
        "None",
        "Cataquiz Subd",
        "Dia-Leyco Subd",
        "Dictado Subd",
        "Lm Subd",
        "Saint Rose Subd",
        "Zavalla Village",
        "Zeramyr Subd",
        "Ciudad Grande",
        "Rosario Heights Subd",
        "RCA Compound",
        "Mercedes Homes",
        "Oval Subd",
        "Terry Town",
        "Satellite Ville",
        "Zavalla Village II",
        "Lake Villde 2 Subd",
    ],
    "Brgy. Pulong Santa Cruz": [
        "None",
        "Buklod Diwa Village",
        "Mercado Village",
        "Sbi",
        "500",
        "Mercado",
        "Tenant",
        "STI",
        "Chestnut",
        "Iraq",
        "Cnb",
        "Borland",
        "Relocation 1",
        "Relocation 2",
        "Relocation 3",
        "Relocation 4",
        "Relocation 5",
        "Samgas",
        "Horizon",
        "Bukal",
        "Ani",
    ],
    "Brgy. Pooc": [
        "None",
        "Honorville",
        "Don Jose Zavalla Subd",
        "St. Francis Homes",
        "East Drive Subd",
    ],
    "Brgy. Sinalhan": [
        "None",
        "Mercedes Homes",
        "Romanville Subd",
        "Zavalla Village",
        "Bayshoreville Subd",
        "Alfonso Homes II",
    ],
    "Brgy. Tagapo": [
        "None",
        "Amihan Subd",
        "AnRos Subd",
        "Cataquiz Subd",
        "Don Pablo Subd",
        "J.B. Village",
        "Limpo Subd",
        "Lm Subd",
        "Progressive Village",
        "Rosaflor Subd",
        "Rosewood Homes",
        "Terrytown West Subd",
        "Tiongco I-III",
        "Celina Homes 5 Subd",
        "Buena Rosa 10",
    ],
    "Brgy. Don Jose": [
        "None",
        "Laguna Bel-Air Subd",
        "Zavalla Subd",
        "Olympia Park Subd",
        "Santarosa Village I",
    ],
    "Brgy. Kanluran": [
        "None",
        "Gomez St.",
        "Zavalla St.",
        "Vallejo St.",
        "Lucero St.",
    ],
    "Brgy. Santo Domingo": ["None", "Laguna Bel Air"],
};

document.addEventListener("DOMContentLoaded", function () {
    const barangaySelect = document.getElementById("barangay");
    const subdivisionSelect = document.getElementById("subdivision");
    const purokSelect = document.getElementById("purok");
    const extraInput = document.getElementById("extra_info");
    const detailedInput = document.getElementById("detailed_location");

    // Capitalize each word function
    function capitalizeWords(str) {
        return str.replace(/\b\w/g, (char) => char.toUpperCase());
    }

    function updateSubdivision() {
        const selected = barangaySelect.value;
        subdivisionSelect.innerHTML = "";

        if (barangayData[selected]) {
            barangayData[selected].forEach((sub) => {
                const opt = document.createElement("option");
                opt.value = sub;
                opt.textContent = sub;
                subdivisionSelect.appendChild(opt);
            });
        } else {
            const opt = document.createElement("option");
            opt.textContent = "None";
            opt.value = "None";
            subdivisionSelect.appendChild(opt);
        }
        updateDetailedLocation();
    }

    function updateDetailedLocation() {
        let extra = capitalizeWords(extraInput.value.trim());
        let purok = purokSelect.value;
        let subdivision = subdivisionSelect.value;
        let barangay = barangaySelect.value;

        if (barangay === "Select Barangay") barangay = "";

        // Build location pattern
        let parts = [];
        if (extra) parts.push(extra);
        if (purok) parts.push(purok);
        if (subdivision && subdivision !== "None") parts.push(subdivision);
        if (barangay) parts.push(barangay);

        detailedInput.value = parts.join(", ");
    }

    // Events
    barangaySelect.addEventListener("change", updateSubdivision);
    purokSelect.addEventListener("change", updateDetailedLocation);
    subdivisionSelect.addEventListener("change", updateDetailedLocation);
    extraInput.addEventListener("input", () => {
        extraInput.value = capitalizeWords(extraInput.value); // live capitalize
        updateDetailedLocation();
    });
});

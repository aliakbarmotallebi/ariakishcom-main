/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
  ],
  theme: {
    extend: {
      fontFamily: {
        iranyekanbakh: ["iranyekanBakh"]
      },
      boxShadow: {
        bxShadow: "0px 15px 30px 0px rgba(0, 0, 0, 0.05)",
        shadowBtn: "0px 4px 25px 0px rgba(2, 132, 199, 0.3)",
        numberShadow: "0px 4px 25px 0px rgba(2, 132, 199, 0.3)",
        uploadBTN : ' rgba(255, 255, 255, 1)'
      },

      width: {
        w168: "168px",
        w264: "264px",
        Inp4 : '290.5px'
      },
      height: {
        h91: "91.96px",
      },
      
      borderRadius: {
        "ro2.5": "2.5rem",
        "r14" : "14px"
      },
      backgroundImage: (theme) => ({

      })
    },
  },
  plugins: [],
}


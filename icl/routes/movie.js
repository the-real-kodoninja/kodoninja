// importing packages
const express = require('express');
const router = express.Router();
const movies = [
    {
        id: 1,
        name: 'The Terminal',
        year: 2004,
        rating: 7.4,
    },
    {
        id: 2,
        name: 'The Outfit',
        year: 2022,
        rating: 7.1,
    },
    {
        id: 3,
        name: 'The Godfather',
        year: 1972,
        rating: 9.2,
    },
    {
        id: 4,
        name: 'The Godfather: Part II',
        year: 1974,
        rating: 9.0,
    },
    {
        id: 5,
        name: 'The Godfather: Part III',
        year: 1990,
        rating: 7.6,
    },
    {
        id: 6,
        name: 'Uncharted',
        year: 2022,
        rating: 6.3,
    },
];
router.get(`/`, function (req, res) {
    res.status(200).json(movies);
});
router.post(`/`, function (req, res) {
    const { name, year, rating } = req.body;
    res.status(200).json([...movies, { id: movies.length + 1, name, year, rating }]);
});
router.delete(`/`, function (req, res) {
    const { id } = req.body;
    res.status(200).json(movies.filter(movie => movie.id !== id));
});
module.exports = router;
const express = require('express')
const router = express.Router()
const Sorting = require('../controllers/V1/Sorting')

router.route('/Sorting')
    .post(Sorting.Sorting);

module.exports = router;
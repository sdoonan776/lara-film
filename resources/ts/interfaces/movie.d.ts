export default interface Movie {
    adult: boolean
    backdrop_path: string | null
    genres: string[] | null
    belongsToCollection: string[] | null
    budget: number
    homepage: string | null
    imdbId: number | null
    movieId: number
    originalLanguage: string
    originalTitle: string
    overview: string | null
    popularity: number
    posterPath: string | null
    productionCompanies: string[]
    productionCountries: string[]
    releaseDate: string
    revenue: number
    runtime: number | null
    spokenLanguages: string[]
    status: string
    tagline: string | null
    title: string
    video: boolean
    voteAverage: number
    voteCount: number
}
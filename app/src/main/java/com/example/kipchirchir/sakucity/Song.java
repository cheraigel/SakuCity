package com.example.kipchirchir.sakucity;

    public class Song {
        public  String title;
        private String genre;
        private String byWho;

        public Song(String title, String genre, String byWho) {
            this.title = title;
            this.genre = genre;
            this.byWho = byWho;
        }

        public String getTitle() {
            return title;
        }

        public void setTitle(String title) {
            this.title = title;
        }

        public String getGenre() {
            return genre;
        }

        public void setGenre(String genre) {
            this.genre = genre;
        }

        public String getByWho() {
            return byWho;
        }

        public void setByWho(String byWho) {
            this.byWho = byWho;
        }
    }
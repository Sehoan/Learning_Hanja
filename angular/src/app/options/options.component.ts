import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'options',
  templateUrl: './options.component.html',
  styleUrls: ['./options.component.css'],
})
export class OptionsComponent implements OnInit {
  options: Array<string> = ['english', 'korean', 'japanese', 'hanja'];

  front: string = '';
  back: string = '';

  constructor() {}

  ngOnInit(): void {}

  startQuiz(formValues: Object): void {
    console.log(formValues);
    // redirect to the flashcards page with formValues
  }
}
